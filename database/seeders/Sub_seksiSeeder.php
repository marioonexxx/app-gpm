<?php

namespace Database\Seeders;

use App\Models\Sub_seksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sub_seksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sub_seksi::insert([
            [
                'nama_sub_seksi' => 'Pembinaan Anak, Remaja dan Katekisasi',
                'seksi_id' => 1,
            ],
            [
                'nama_sub_seksi' => 'Pembinaan Pemuda',
                'seksi_id' => 1,
            ],
            [
                'nama_sub_seksi' => 'Pemberitaan Injil',
                'seksi_id' => 2,
            ],
            [
                'nama_sub_seksi' => 'Pemberdayaan Ekonomi Umat',
                'seksi_id' => 2,
            ],
            [
                'nama_sub_seksi' => 'Pembinaan Kerjasama Antar Agama dan Aliran Kepercayaan',
                'seksi_id' => 3,
            ],
            [
                'nama_sub_seksi' => 'Lingkungan Hidup dan Keutuhan Ciptaan',
                'seksi_id' => 3,
            ],
            [
                'nama_sub_seksi' => 'Pembinaan Sistem dan Manajemen Keuangan',
                'seksi_id' => 4,
            ],
            [
                'nama_sub_bidang' => 'Pembinaan Penggunaan dan Pengendalian Keuangan Gereja',
                'seksi_id' => 4,
            ],
        ]);
    }
}
