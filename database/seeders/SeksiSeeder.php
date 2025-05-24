<?php

namespace Database\Seeders;

use App\Models\Seksi;
use App\Models\Sub_seksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seksi::insert([
            ['nama_seksi' => 'Seksi PTPU (Pemberdayaan Teologi dan Pembinaan Umat)'],
            ['nama_seksi' => 'Seksi PIPK (Pemberitaan Injil dan Pelayanan Kasih)'],
            ['nama_seksi' => 'Seksi POS (Pengembangan Oikumene Semesta)'],
            ['nama_seksi' => 'Seksi PPK (Penataan dan Pengembangan Kelembagaan)'],
        ]);
    }
}
