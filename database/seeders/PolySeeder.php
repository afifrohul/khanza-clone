<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polies = [
            [
                'kode_unit' => 'UMUM',
                'nama_unit' => 'POLI UMUM',
                'deskripsi' => '',
                'is_active' => true
            ]
        ];

        foreach ($polies as $item) {
            \App\Models\Poly::create($item);
        }
    }
}
