<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Pelapor;
use App\Models\Ruangan;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    // 1. Form untuk membuat laporan
    public function create()
    {
        $ruangans = Ruangan::all();
        $kategoris = Kategori::all();

        return view('laporan.create', compact('ruangans', 'kategoris'));
    }

    // 2. Proses penyimpanan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|',
            'nomor_hp' => 'required|string|max:13',
            'ruangan_id' => 'required|exists:ruangans,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'keterangan' => 'required|string|min:10',
            'dokumen_pendukung' => 'nullable|file|max:2048', // Batas 2MB
        ]);

        // Menggunakan updateOrCreate untuk memastikan data pelapor
        $pelapor = Pelapor::updateOrCreate(
            ['nik' => $request->nik],
            ['nama' => $request->nama, 'nomor_hp' => $request->nomor_hp]
        );

        // tiket
        $tanggalHariIni = date('Ymd');
        $jumlahLaporanHariIni = Laporan::whereDate('created_at', $tanggalHariIni)->count() + 1;
        $nomorUrut = str_pad($jumlahLaporanHariIni, 2, '0', STR_PAD_LEFT);
        $nomorTiket = "W-IT{$tanggalHariIni}{$nomorUrut}";

        $laporan = Laporan::create([
            'nomor_tiket' => $nomorTiket,
            'pelapor_id' => $pelapor->id,
            'ruangan_id' => $request->ruangan_id,
            'kategori_id' => $request->kategori_id,
            'keterangan' => $request->keterangan,
            'dokumen_pendukung' => $request->file('dokumen_pendukung')
                ? $request->file('dokumen_pendukung')->storeAs('dokumen_pendukungs', $nomorTiket . '_' .  uniqid() . '.' . $request->file('dokumen_pendukung')->getClientOriginalExtension())
                : null,
            'status' => 'Diterima',
        ]);

        $pelaporPhoneNumber = $pelapor->nomor_hp;
        $groupId = $this->getGroupWhatsAppId();

        $userMessage = $this->generateWhatsAppMessageForUser($laporan);

        $adminMessage = $this->generateWhatsAppMessageForAdmin($laporan);

        $formattedPelaporPhone = $this->formatWhatsAppNumber($pelaporPhoneNumber);

        $this->sendWhatsAppMessage($formattedPelaporPhone, $userMessage);
        $this->sendWhatsAppMessage($groupId, $adminMessage);

        return redirect()->route('laporan.success', ['nomor_tiket' => $laporan->nomor_tiket])
            ->with('success', 'Laporan berhasil dibuat! Nomor tiket Anda: ' . $laporan->nomor_tiket);
    }

    public function getLastRuangan(Request $request)
    {
        $nik = $request->input('nik');

        // cari pelapor berdasarkan NIK
        $pelapor = Pelapor::where('nik', $nik)->first();
        if ($pelapor) {
            // cari laporan terakhir dari pelapor
            $lastLaporan = Laporan::where('pelapor_id', $pelapor->id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($lastLaporan) {
                return response()->json([
                    'success' => true,
                    'ruangan_id' => $lastLaporan->ruangan_id
                ]);
            }
        }

        return response()->json([
            'success' => false
        ]);
    }

    private function formatWhatsAppNumber($phoneNumber)
    {
        // Format nomor telepon untuk WhatsApp
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (substr($cleaned, 0, 1) === '0') {
            $cleaned = '62' . substr($cleaned, 1);
        }
        return $cleaned;
    }

    private function getGroupWhatsAppId()
    {
        return '628976346064-1500892951@g.us';
    }

    private function generateWhatsAppMessageForUser($laporan)
    {
        // salam berdasarkan waktu
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
        $message = "==Wadul IT RSD Kalisat ==\n\n" .
            "$salam, Terima kasih sudah membuat pelaporan di Wadul IT RSD Kalisat.\n" .
            "Laporan anda dalam proses tindak lanjuti.\n" .
            "No. Tiket: {$laporan->nomor_tiket}\n\n" .
            "Cek Laporanmu Melalui:\n" .
            "https://wadul-it.rsdkalisat.com/laporan/{$laporan->nomor_tiket}";
        return $message;
    }

    private function generateWhatsAppMessageForAdmin($laporan)
    {
        $message = "==Wadul IT RSD Kalisat ==\n\n" .
            "Link Laporan:https://wadul-it.rsdkalisat.com/laporan/{$laporan->nomor_tiket}\n" .
            "Nomor Tiket: {$laporan->nomor_tiket}\n" .
            "Pelapor: {$laporan->pelapor->nama}\n" .
            "No. WA: {$laporan->pelapor->nomor_hp}\n" .
            "Ruangan: {$laporan->ruangan->nama}\n" .
            "Kategori: {$laporan->kategori->nama}\n" .
            "Keterangan: {$laporan->keterangan}\n";
        return $message;
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

    public function success($nomor_tiket)
    {
        return view('laporan.success', compact('nomor_tiket'));
    }
}
