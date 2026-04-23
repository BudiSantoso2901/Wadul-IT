<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ManajemenController extends Controller
{
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        if ($request->ajax()) {

            $query = Laporan::with('pelapor', 'ruangan', 'kategori', 'updatedBy', 'updatedBySelesai')
                ->orderBy('created_at', 'desc');

            // ── Filter Ruangan ──────────────────────────────
            if ($request->filled('ruangan_id')) {
                $query->where('ruangan_id', $request->ruangan_id);
            }

            // ── Filter Range Tanggal (format: "2025-06-01 - 2025-06-30") ──
            if ($request->filled('range_tanggal')) {
                $parts = explode(' - ', $request->range_tanggal);
                if (count($parts) === 2) {
                    $start = Carbon::createFromFormat('d/m/Y', trim($parts[0]))->startOfDay();
                    $end   = Carbon::createFromFormat('d/m/Y', trim($parts[1]))->endOfDay();
                    $query->whereBetween('created_at', [$start, $end]);
                }
            }

            // ── Filter Pelapor (search by name) ─────────────
            if ($request->filled('pelapor')) {
                $keyword = $request->pelapor;
                $query->whereHas('pelapor', function ($q) use ($keyword) {
                    $q->where('nama', 'like', '%' . $keyword . '%');
                });
            }

            $laporans = $query->get();

            $data = [];
            foreach ($laporans as $laporan) {
                $waktu_diproses           = '-';
                $waktu_selesai_keterangan = '';

                $created_at = Carbon::parse($laporan->created_at);

                if ($laporan->status && $laporan->waktu_diproses) {
                    $waktu_diproses = Carbon::parse($laporan->waktu_diproses)
                        ->diffForHumans($created_at);
                }

                if ($laporan->waktu_diproses && $laporan->updated_at) {
                    $waktu_selesai_keterangan = Carbon::parse($laporan->updated_at)
                        ->diffForHumans(Carbon::parse($laporan->waktu_diproses));
                }

                $data[] = [
                    'id'                       => $laporan->id,
                    'nomor_tiket'              => $laporan->nomor_tiket,
                    'pelapor'                  => $laporan->pelapor->nama,
                    'ruangan'                  => $laporan->ruangan->nama,
                    'kategori'                 => $laporan->kategori->nama,
                    'keterangan'               => $laporan->keterangan,
                    'status'                   => $laporan->status,
                    'dokumen_pendukung'        => $laporan->dokumen_pendukung,
                    'waktu_diproses'           => $waktu_diproses . '<br><small>Updated by ' .
                        ($laporan->updatedBy ? $laporan->updatedBy->name : 'Tidak ada') . '</small>',
                    'waktu_selesai_keterangan' => $waktu_selesai_keterangan . '<br><small>Updated by ' .
                        ($laporan->updatedBySelesai ? $laporan->updatedBySelesai->name : 'Tidak ada') . '</small>',
                    'deskripsi'                => $laporan->deskripsi,
                    'created_at'               => $laporan->created_at->format('d F Y H:i'),
                ];
            }

            return response()->json(['data' => $data]);
        } else {
            // Untuk mengisi dropdown ruangan di filter
            $ruangans = \App\Models\Ruangan::orderBy('nama')->get();
            $laporans = Laporan::orderBy('created_at', 'desc')->get();

            return view('admin.dashboard', compact('laporans', 'ruangans'));
        }
    }

    public function editStatus($id)
    {
        $laporan = Laporan::findOrFail($id); // Mencari laporan berdasarkan ID

        // Mengembalikan view dengan data laporan
        return view('laporan.edit', compact('laporan'));
    }

    // Memperbarui status laporan
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:Diterima,Diproses,Selesai',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            $laporan = Laporan::with('pelapor')->findOrFail($id);

            // Cek jika laporan sudah selesai dan terkunci
            if ($laporan->status === 'Selesai' && $laporan->is_locked) {
                return redirect()->route('laporan.edit', $id)
                    ->with('error', 'Status laporan sudah selesai dan terkunci, tidak bisa diubah.');
            }

            // Simpan status lama untuk membandingkan
            $statusLama = $laporan->status;

            // Perbarui status laporan
            $laporan->status = $request->status;

            if ($laporan->status === 'Diproses') {
                $laporan->waktu_diproses = now();
                $laporan->updated_by = auth()->id();
                $laporan->deskripsi = $request->deskripsi;
            }

            if ($laporan->status === 'Selesai') {
                $laporan->updated_by_selesai = auth()->id();
                $laporan->deskripsi = $request->deskripsi;
                $laporan->is_locked = true;
            }

            $laporan->save();

            // Kirim notifikasi WhatsApp
            $pelaporPhoneNumber = $laporan->pelapor->nomor_hp;
            $groupId = $this->getGroupWhatsAppId();
            $adminName = auth()->user()->name;

            $currentHour = now()->hour;
            $salam = 'Selamat ';
            if ($currentHour >= 3 && $currentHour < 11) {
                $salam .= 'Pagi! 🌞';
            } elseif ($currentHour >= 11 && $currentHour < 15) {
                $salam .= 'Siang! 🌤️';
            } elseif ($currentHour >= 15 && $currentHour < 18) {
                $salam .= 'Sore! 🌥️';
            } else {
                $salam .= 'Malam! 🌜️';
            }

            if ($statusLama !== $laporan->status) {
                if ($laporan->status === 'Diproses') {
                    // Pesan untuk pelapor
                    $userMessage = "==Wadul IT RSD Kalisat ==\n\n" .
                        "$salam, Laporan anda sedang diproses oleh IT RSD Kalisat.\n" .
                        "No Ticket: {$laporan->nomor_tiket}\n\n" .
                        "Cek Laporanmu Melalui:\nhttps://wadul-it.rsdkalisat.com/laporan/{$laporan->nomor_tiket}";

                    // Pesan untuk grup admin
                    $adminMessage = "==Laporan diProses==\n" .
                        "No.Tiket: {$laporan->nomor_tiket}\n" .
                        "Update By: {$adminName}";
                } elseif ($laporan->status === 'Selesai') {
                    // Pesan untuk pelapor
                    $userMessage = "==Wadul IT RSD Kalisat ==\n\n" .
                        "$salam, Laporan anda telah selesai ditindaklanjuti oleh IT RSD Kalisat.\n" .
                        "No Ticket: {$laporan->nomor_tiket}\n\n" .
                        "Cek Laporanmu Melalui:\nhttps://wadul-it.rsdkalisat.com/laporan/{$laporan->nomor_tiket}\n\n" .
                        "Mohon untuk tidak membalas ke nomor ini, karena pesan ini dikirim otomatis oleh sistem.";

                    // Pesan untuk grup admin
                    $adminMessage = "==Laporan Selesai==\n" .
                        "No.Tiket: {$laporan->nomor_tiket}\n" .
                        "Update By: {$adminName}";
                }

                $formattedPelaporPhone = $this->formatWhatsAppNumber($pelaporPhoneNumber);

                // Kirim pesan ke pelapor dan grup admin
                $this->sendWhatsAppMessage($formattedPelaporPhone, $userMessage);
                $this->sendWhatsAppMessage($groupId, $adminMessage);
            }

            return redirect()->route('laporan.view', $id)->with('success', 'Status berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('laporan.edit', $id)->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function formatWhatsAppNumber($phoneNumber)
    {
        // Format nomor telepon untuk WhatsApp
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (substr($cleaned, 0, 1) === '0') {
            $cleaned = '62' . substr($cleaned, 1);
        }
        return $cleaned . '@c.us';
    }

    private function getGroupWhatsAppId()
    {
        return '628976346064-1500892951@g.us';
    }

    private function sendWhatsAppMessage($phoneNumber, $message)
    {
        $SECRET_TOKEN = 'mnsve3hD8m9qLLq6gW8n';

        Http::withHeaders([
            'Authorization' => $SECRET_TOKEN
        ])->post('https://api.fonnte.com/send', [
            'target' => $phoneNumber,
            'message' => $message,
        ]);
    }
}
