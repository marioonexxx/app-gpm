<?php

namespace Database\Seeders;

use App\Models\Program_strategis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStrategisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program_strategis::insert([
            [
                'nama_program' => 'Peningkatan Kualitas PFG',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pembaruan dan Penerapan Kurikulum dan Buku Ajar PFG (Klasis)',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pembentukan dan Pengembangan Bengkel PFG (Klasis)',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pengembangan Kreatifias Anak (Klasis)',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pemberdayaan Ekonomi Warga Jemaat',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pelayanan Sakit Kepada Orang Sakit',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Pemberian Dukungan Perawatan Kesehatan dan Moril Bagi Warga Jemaat dan Pelayan Yang Sakit',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Fasilitas Dukungan Sosial, Spiritual Bagi Umat Yang Berduka',
                'periode_renstra' => '2021-2025',
            ],
            [
                'nama_program' => 'Penanganan Hukum dan Advokasi Persoalan Dalam Jemaat',
                'periode_renstra' => '2021-2025',
            ],
        ]);
    }
}
