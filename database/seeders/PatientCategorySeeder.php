<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient_categories = [
            [
                'name' => 'Pasien Umum'
            ],
            [
                'name' => 'Pasien BPJS'
            ],
        ];

        foreach ($patient_categories as $item) {
            \App\Models\PatientCategory::create($item);
        }
    }
}
