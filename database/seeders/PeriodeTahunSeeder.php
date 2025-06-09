<?php

namespace Database\Seeders;

use App\Models\Periode_tahun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeTahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode_tahun::insert([
            [
                'nama_tahun' => '2025',
                'status' => '1',
            ],
            [
                'nama_tahun' => '2026',
                'status' => '0',
            ],
            [
                'nama_tahun' => '2027',
                'status' => '0',
            ],
        ]);

    }
}
