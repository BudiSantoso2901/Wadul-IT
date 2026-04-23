<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelapor;
use Illuminate\Support\Facades\Log;

class PelaporController extends Controller
{
    public function search(Request $request)
    {
        $nik = $request->query('nik');
        // $pelapor = Pelapor::where('nik', 'like', "%$nik%")->get();
        $pelapor = Pelapor::where('nik', $nik)->first();

        if ($pelapor) {
            return response()->json([
                'success' => true,
                'data' => $pelapor,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data pelapor tidak ditemukan',
        ]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datapelapor = Pelapor::get();
            return response()->json([
                'data' => $datapelapor
            ], 200);
        }
        return view('admin.pelapor');
    }
    // Menyimpan pelapor baru
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:pelapors',
            'nomor_hp' => 'required|string'


        ]);

        // Store data
        try {
            Pelapor::create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'pelapor berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan pelapor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    // Menampilkan data pelapor untuk edit
    public function show($id)
    {
        $pelapor = Pelapor::find($id);

        if (!$pelapor) {
            Log::error("Room with ID: {$id} not found");
            return response()->json(['error' => 'pelapor tidak ditemukan'], 404);
        }

        return response()->json($pelapor);
    }

    // Memperbarui data pelapor
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'nomor_hp' => 'required|string'

        ]);

        try {
            $pelapor = Pelapor::find($id);
            $pelapor->update($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'pelapor berhasil diubah!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengubah pelapor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Menghapus pelapor
    public function destroy($id)
    {
        try {
            $pelapor = Pelapor::findOrFail($id);
            $pelapor->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'pelapor berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menghapus pelapor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
