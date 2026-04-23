<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sobri',
            'password' => bcrypt('sobri666'),
        ]);
        User::create([
            'name' => 'Raes',
            'password' => bcrypt('raes666'),
        ]);
        User::create([
            'name' => 'Jemmy',
            'password' => bcrypt('jemmy666'),
        ]);
        User::create([
            'name' => 'Budi',
            'password' => bcrypt('budz666'),
        ]);
        User::create([
            'name' => 'Sukron',
            'password' => bcrypt('sukron666'),
        ]);
        User::create([
            'name' => 'Ardha',
            'password' => bcrypt('ardha666'),
        ]);
    }
}
