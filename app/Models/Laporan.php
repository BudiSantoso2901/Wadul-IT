<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_tiket',
        'pelapor_id',
        'ruangan_id',
        'kategori_id',
        'keterangan',
        'dokumen_pendukung',
        'status',
        'is_locked',
        'deskripsi',
        'waktu_diproses',
        'updated_by',
        'updated_by_selesai'
    ];

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(Pelapor::class);
    }

    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function updatedBySelesai()
    {
        return $this->belongsTo(User::class, 'updated_by_selesai');
    }
}
