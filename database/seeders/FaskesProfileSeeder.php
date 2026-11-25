<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaskesProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'nama_faskes' => 'Klinik A',
                'kode_faskes_bpjs' => fake()->numerify(),
                'kode_faskes_kemenkes' => fake()->numerify(),
                'ihs_organization_id' => fake()->numerify(),
                'alamat' => 'JL SUDIRMAN No. 01',
                'kota' => 'Jember',
                'provinsi' => 'Jawa Timur',
                'no_telp' => '081778653391',
                'email' => 'clinic@example.com',
                'logo' => '', 
            ]
        ];

        foreach ($profiles as $item) {
            \App\Models\FaskesProfile::create($item);
        }
    }
}
