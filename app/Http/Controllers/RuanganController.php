<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RuanganController extends Controller
{
    public function ruangan(Request $request)
    {
        if ($request->ajax()) {
            $dataruangan = Ruangan::orderBy('nama', 'asc')->get();
            return response()->json([
                'data' => $dataruangan
            ], 200);
        }
        return view('admin.ruangan');
    }
    // Menyimpan ruangan baru
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',

        ]);

        // Store data
        try {
            Ruangan::create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Ruangan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan ruangan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    // Menampilkan data ruangan untuk edit
    public function show($id)
    {
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            Log::error("Room with ID: {$id} not found");
            return response()->json(['error' => 'Ruangan tidak ditemukan'], 404);
        }

        return response()->json($ruangan);
    }

    // Memperbarui data ruangan
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',

        ]);

        try {
            $ruangan = Ruangan::find($id);
            $ruangan->update($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Ruangan berhasil diubah!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengubah ruangan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Menghapus ruangan
    public function destroy($id)
    {
        try {
            $ruangan = Ruangan::findOrFail($id);
            $ruangan->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Ruangan berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menghapus ruangan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
