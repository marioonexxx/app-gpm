<?php

namespace Database\Seeders;

use App\Models\Periode_renstra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeRenstraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode_renstra::insert([
            [
                'nama_periode' => '2021-2025',
                'status' => '1',
            ],
            [
                'nama_periode' => '2026-2030',
                'status' => '0',
            ],
            [
                'nama_periode' => '2031-2035',
                'status' => '0',
            ],
        ]);
    }
}
