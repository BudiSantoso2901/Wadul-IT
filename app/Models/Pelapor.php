<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    use HasFactory;
    protected $table = 'pelapors';
    protected $fillable = ['nama', 'nik', 'nomor_hp'];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
}
