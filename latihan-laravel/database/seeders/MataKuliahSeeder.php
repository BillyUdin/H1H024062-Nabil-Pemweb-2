<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            ['kode' => 'PW2', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 5],
            ['kode' => 'BD1', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 3],
            ['kode' => 'JK1', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 4],
            ['kode' => 'RPL', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 4],
        ];

        foreach ($daftar as $item) {
            MataKuliah::create($item);
        }
    }
}