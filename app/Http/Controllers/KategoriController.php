<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    //
    // Menampilkan semua kategori
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datakategori = Kategori::get();
            // log::info($datakategori);
            return response()->json([
                'data' => $datakategori
            ], 200);
        }

        return view('admin.kategori');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Store data
        try {
            Kategori::create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan kategori.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Menampilkan data kategori untuk edit
    public function show($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            Log::error("Kategori dengan ID: {$id} tidak ditemukan");
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json($kategori);
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        try {
            $kategori = Kategori::find($id);
            if (!$kategori) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Kategori tidak ditemukan.',
                ], 404);
            }

            $kategori->update($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil diubah!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengubah kategori.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus.']);
    }
}
