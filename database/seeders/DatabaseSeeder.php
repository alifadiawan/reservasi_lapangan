<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\lapangan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => ('123456'),
            'role' => 'admin'
        ]);

        lapangan::create([
            'nama_lapangan' => 'Lapangan Indoor'
        ]);

        lapangan::create([
            'nama_lapangan' => 'Lapangan Outdoor'
        ]);
    }
}
