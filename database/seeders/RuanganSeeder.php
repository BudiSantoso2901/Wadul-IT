<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Ruangan::create(['nama' => 'Instalasi Gizi']);
        Ruangan::create(['nama' => 'Ruang IGD']);
        Ruangan::create(['nama' => 'Ruang ICU']);
        Ruangan::create(['nama' => 'Admisi atau Loket Pendaftaran']);
        Ruangan::create(['nama' => 'Apotek Farmasi']);
        Ruangan::create(['nama' => 'Laboratorium']);
        Ruangan::create(['nama' => 'Radiologi']);
        Ruangan::create(['nama' => 'OKA']);
        Ruangan::create(['nama' => 'Klinik Anak']);
        Ruangan::create(['nama' => 'Klinik Bedah']);
        Ruangan::create(['nama' => 'Klinik Kebidanan dan Kandungan']);
        Ruangan::create(['nama' => 'Klinik Penyakit Dalam']);
        Ruangan::create(['nama' => 'Klinik Saraf']);
        Ruangan::create(['nama' => 'Klinik THT']);
        Ruangan::create(['nama' => 'Klinik Orthopedi']);
        Ruangan::create(['nama' => 'Poli Umum']);
        Ruangan::create(['nama' => 'Klinik Gigi dan Mulut']);
        Ruangan::create(['nama' => 'Gizi Klinik']);
        Ruangan::create(['nama' => 'Klinik Jantung']);
        Ruangan::create(['nama' => 'Keluarga Berencana']);
        Ruangan::create(['nama' => 'Cendrawasih (VIP)']);
        Ruangan::create(['nama' => 'Kasuari (Kelas I)']);
        Ruangan::create(['nama' => 'Manyar (Anak)']);
        Ruangan::create(['nama' => 'Kenari (Nifas)']);
        Ruangan::create(['nama' => 'Bangau (Bedah)']);
        Ruangan::create(['nama' => 'Merpati (Interna)']);
        Ruangan::create(['nama' => 'Camar (Perimatologi)']);
        Ruangan::create(['nama' => 'VK']);
        Ruangan::create(['nama' => 'Kantor RSD Kalisat']);





    }
}
