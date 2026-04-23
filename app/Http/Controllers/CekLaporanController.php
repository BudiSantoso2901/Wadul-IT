<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CekLaporanController extends Controller
{
    public function index(Request $request)
    {
        return view('laporan.cek_laporan');
    }

    public function cari(Request $request)
    {
        $search = $request->input('search');

        $laporans = Laporan::where('nomor_tiket', 'like', '%' . $search . '%')
            ->orWhereHas('pelapor', function ($query) use ($search) {
                $query->where('nik', 'like', '%' . $search . '%')
                    ->orWhere('nomor_hp', 'like', '%' . $search . '%');
            })
            ->get();

        if ($laporans->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data yang sesuai'], 404);
        }

        $data = [];
        foreach ($laporans as $laporan) {
            // Menghitung waktu respons
            $waktu_diproses = '-'; // Default jika tidak ada perhitungan waktu respons
            $waktu_selesai_keterangan = ''; // Keterangan waktu selesai jika ada

            // Pastikan waktu dibuat dan waktu diproses adalah objek Carbon
            $created_at = Carbon::parse($laporan->created_at); // Mengonversi created_at menjadi objek Carbon

            // Jika status 'Diproses', hitung waktu respons dari diterima ke diproses
            if ($laporan->status && $laporan->waktu_diproses) {
                $waktu_diproses = Carbon::parse($laporan->waktu_diproses)->diffForHumans($created_at);
            }
            if ($laporan->waktu_diproses && $laporan->updated_at) {
                // Hitung waktu selesai dari waktu_diproses ke updated_at
                $waktu_selesai_keterangan = Carbon::parse($laporan->updated_at)->diffForHumans(Carbon::parse($laporan->waktu_diproses));
            }

            // Menambahkan data ke array
            $data[] = [
                'id' => $laporan->id,
                'nomor_tiket' => $laporan->nomor_tiket,
                'created_at' => $laporan->created_at->format('d F Y H:i'),
                'pelapor' => $laporan->pelapor->nama,
                'ruangan' => $laporan->ruangan->nama,
                'kategori' => $laporan->kategori->nama,
                'keterangan' => $laporan->keterangan,
                'status' => $laporan->status,
                'dokumen_pendukung' => $laporan->dokumen_pendukung,
                'waktu_diproses' => $waktu_diproses . '<br>' . ' Di Respons ' . ($laporan->updatedBy ? $laporan->updatedBy->name : 'Tidak ada'),
                'waktu_selesai_keterangan' => $waktu_selesai_keterangan  . '<br>' . ' Di Respons ' . ($laporan->updatedBySelesai ? $laporan->updatedBySelesai->name : 'Tidak ada'), // Menambahkan keterangan waktu selesai
                'deskripsi' => $laporan->deskripsi,
            ];
        }

        return response()->json($data);
    }
    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:Diterima,Diproses,Selesai',
        ]);


        // Cari laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Perbarui status
        $laporan->status = $request->status;

        // Jika status adalah 'Selesai', kunci laporan
        if ($request->status === 'Selesai') {
            $laporan->is_locked = true;
        } else {
            $laporan->is_locked = false; // Opsi jika ingin membuka kembali ketika status berubah
        }

        // Simpan perubahan
        $laporan->save();

        // Kembalikan respons
        return response()->json([
            'message' => 'Status berhasil diperbarui.',
            'laporan' => $laporan,
        ]);
    }
    public function showByTicket($nomor_tiket)
    {
        // Cari laporan berdasarkan nomor tiket, dengan relasi pelapor, ruangan, dan kategori
        $laporan = Laporan::where('nomor_tiket', $nomor_tiket)
            ->with(['pelapor', 'ruangan', 'kategori', 'updatedBy']) // Pastikan eager loading relasi yang dibutuhkan
            ->first();

        // Jika laporan tidak ditemukan, tampilkan pesan error
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan dengan nomor tiket tersebut tidak ditemukan.');
        }

        $waktu_diproses = ''; // Default jika tidak ada perhitungan waktu respons
        $waktu_selesai_keterangan = ''; // Keterangan waktu selesai jika ada

        // Pastikan waktu dibuat dan waktu diproses adalah objek Carbon
        $created_at = Carbon::parse($laporan->created_at); // Mengonversi created_at menjadi objek Carbon

        // Jika status 'Diproses', hitung waktu respons dari diterima ke diproses
        if ($laporan->status && $laporan->waktu_diproses) {
            $waktu_diproses = Carbon::parse($laporan->waktu_diproses)->diffForHumans($created_at);
        }
        if ($laporan->waktu_diproses && $laporan->updated_at) {
            // Hitung waktu selesai dari waktu_diproses ke updated_at
            $waktu_selesai_keterangan = Carbon::parse($laporan->updated_at)->diffForHumans(Carbon::parse($laporan->waktu_diproses));
        }

        // Kirim data ke view
        return view('laporan.detail', [
            'laporan' => [
                'id' => $laporan->id,
                'nomor_tiket' => $laporan->nomor_tiket,
                'created_at' => $laporan->created_at->format('d F Y H:i'),
                'pelapor' => $laporan->pelapor->nama,
                'ruangan' => $laporan->ruangan->nama,
                'kategori' => $laporan->kategori->nama,
                'keterangan' => $laporan->keterangan,
                'status' => $laporan->status,
                'dokumen_pendukung' => $laporan->dokumen_pendukung,
                'waktu_diproses' => $waktu_diproses . "\n Di Respons " . ($laporan->updatedBy ? $laporan->updatedBy->name : 'Tidak ada'),
                'waktu_selesai_keterangan' => $waktu_selesai_keterangan . "\n Di Respons " . ($laporan->updatedBySelesai ? $laporan->updatedBySelesai->name : 'Tidak ada'),
                'deskripsi' => $laporan->deskripsi,
            ],
        ]);
    }
}
