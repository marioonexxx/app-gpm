<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
            'name' => 'Example Seksi 1',
            'email' => 'seksi1@example.com',
            'no_hp' => '081122334455',
            'alamat' => 'Example Alamat',
            'role' => 1,
            'seksi_id' => 1,
            'sub_seksi_id' => 1,
            'password' => Hash::make('12345678'),
            ],
            [
            'name' => 'Example Sub Seksi 1',
            'email' => 'subseksi1@example.com',
            'no_hp' => '081122334466',
            'alamat' => 'Example Alamat',
            'role' => 2,
            'seksi_id' => 1,
            'sub_seksi_id' => 1,
            'password' => Hash::make('12345678'),
            ],
            [
            'name' => 'Example Keuangan',
            'email' => 'keuangan@example.com',
            'no_hp' => '081122332266',
            'alamat' => 'Example Alamat',
            'role' => '3',
            'seksi_id' => null,
            'sub_seksi_id' => null,
            'password' => Hash::make('12345678'),
            ],
            [
            'name' => 'Example Litbang',
            'email' => 'litbang@example.com',
            'no_hp' => '081166334466',
            'alamat' => 'Example Alamat',
            'role' => '4',
            'seksi_id' => null,
            'sub_seksi_id' => null,
            'password' => Hash::make('12345678'),
            ],
            [
            'name' => 'Example Sekretaris',
            'email' => 'sekretaris@example.com',
            'no_hp' => '083322334466',
            'alamat' => 'Example Alamat',
            'role' => '5',
            'seksi_id' => null,
            'sub_seksi_id' => null,
            'password' => Hash::make('12345678'),
            ],
            [
            'name' => 'Example Administrator',
            'email' => 'administrator@example.com',
            'no_hp' => '083562334466',
            'alamat' => 'Example Alamat',
            'role' => '0',
            'seksi_id' => null,
            'sub_seksi_id' => null,
            'password' => Hash::make('12345678'),
            ],
            
        ]);
    }
}
