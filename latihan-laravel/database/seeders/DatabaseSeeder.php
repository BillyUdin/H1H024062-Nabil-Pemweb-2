<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProgramStudiSeeder::class);
        $this->call(MataKuliahSeeder::class);
        Mahasiswa::factory()->count(30)->create();
    }
}