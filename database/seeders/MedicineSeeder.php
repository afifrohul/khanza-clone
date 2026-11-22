<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            [
                'name' => 'Paracetamol 500 mg',
                'unit' => 'Tablet'
            ],
            [
                'name' => 'Amoxcilin 500 mg',
                'unit' => 'Kapsul'
            ],
            [
                'name' => 'Paracetamol Syrup',
                'unit' => 'Botol'
            ],
        ];

        foreach ($medicines as $item) {
            \App\Models\Medicine::create($item);
        }
    }
}
