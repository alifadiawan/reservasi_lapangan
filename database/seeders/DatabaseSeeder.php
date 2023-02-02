<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kelas;
use App\Models\lapangan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => ('123456'),
            'role' => 'siswa'
        ]);

        lapangan::create([
            'nama_lapangan' => 'Lapangan Indoor'
        ]);

        lapangan::create([
            'nama_lapangan' => 'Lapangan Outdoor'
        ]);

        $createMultipleUsers = [
                    ['nama_kelas'=>'10 AKL 1'],
            		['nama_kelas'=>'10 AKL 2'],
                    ['nama_kelas'=>'10 AKL 3'],
                    ['nama_kelas'=>'10 AKL 4'],
                    ['nama_kelas'=>'10 AKL 4'],
                    ['nama_kelas'=>'10 OTKP 1'],
                    ['nama_kelas'=>'10 OTKP 2'],
                    ['nama_kelas'=>'10 OTKP 3'],
                    ['nama_kelas'=>'10 OTKP 4'],
                    ['nama_kelas'=>'10 OTKP 5'],
                    ['nama_kelas'=>'10 RPL 1'],
                    ['nama_kelas'=>'10 RPL 2'],
                    ['nama_kelas'=>'10 TKJ 1'],
                    ['nama_kelas'=>'10 TKJ 2'],
                    ['nama_kelas'=>'10 MM 1'],
                    ['nama_kelas'=>'10 MM 2'],
                    ['nama_kelas'=>'10 BDP 1'],
                    ['nama_kelas'=>'10 BDP 2'],
                    ['nama_kelas'=>'10 PH 1'],
                    ['nama_kelas'=>'10 PH 2'],
                    ['nama_kelas'=>'10 DKV 1'],
                    ['nama_kelas'=>'10 DKV 2'],
                    ['nama_kelas'=>'10 PSPT 1'],
                    ['nama_kelas'=>'10 PSPT 2'],
                    ['nama_kelas'=>'11 AKL 1'],
                    ['nama_kelas'=>'11 AKL 2'],
                    ['nama_kelas'=>'11 AKL 3'],
                    ['nama_kelas'=>'11 AKL 4'],
                    ['nama_kelas'=>'11 AKL 5'],
                    ['nama_kelas'=>'11 OTKP 1'],
                    ['nama_kelas'=>'11 OTKP 2'],
                    ['nama_kelas'=>'11 OTKP 3'],
                    ['nama_kelas'=>'11 OTKP 4'],
                    ['nama_kelas'=>'11 OTKP 5'],
                    ['nama_kelas'=>'11 RPL 1'],
                    ['nama_kelas'=>'11 RPL 2'],
                    ['nama_kelas'=>'11 TKJ 1'],
                    ['nama_kelas'=>'11 TKJ 2'],
                    ['nama_kelas'=>'11 MM 1'],
                    ['nama_kelas'=>'11 MM 2'],
                    ['nama_kelas'=>'11 BDP 1'],
                    ['nama_kelas'=>'11 BDP 2'],
                    ['nama_kelas'=>'11 PH 1'],
                    ['nama_kelas'=>'11 PH 2'],
                    ['nama_kelas'=>'11 DKV 1'],
                    ['nama_kelas'=>'11 DKV 2'],
                    ['nama_kelas'=>'11 PSPT 1'],
                    ['nama_kelas'=>'11 PSPT 2'],
                    ['nama_kelas'=>'12 AKL 1'],
                    ['nama_kelas'=>'12 AKL 2'],
                    ['nama_kelas'=>'12 AKL 3'],
                    ['nama_kelas'=>'12 AKL 4'],
                    ['nama_kelas'=>'12 AKL 5'],
                    ['nama_kelas'=>'12 OTKP 1'],
                    ['nama_kelas'=>'12 OTKP 2'],
                    ['nama_kelas'=>'12 OTKP 3'],
                    ['nama_kelas'=>'12 OTKP 4'],
                    ['nama_kelas'=>'12 OTKP 5'],
                    ['nama_kelas'=>'12 RPL 1'],
                    ['nama_kelas'=>'12 RPL 2'],
                    ['nama_kelas'=>'12 TKJ 1'],
                    ['nama_kelas'=>'12 TKJ 2'],
                    ['nama_kelas'=>'12 MM 1'],
                    ['nama_kelas'=>'12 MM 2'],
                    ['nama_kelas'=>'12 BDP 1'],
                    ['nama_kelas'=>'12 BDP 2'],
                    ['nama_kelas'=>'12 PH 1'],
                    ['nama_kelas'=>'12 PH 2'],
                    ['nama_kelas'=>'12 DKV 1'],
                    ['nama_kelas'=>'12 DKV 2'],
                    ['nama_kelas'=>'12 PSPT 1'],
                    ['nama_kelas'=>'12 PSPT 1']
        ];
        kelas::insert($createMultipleUsers); // Eloquent
    }
}

                    