<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'nama_posisi' => 'Admin'
            ],
            [
                'nama_posisi' => 'Registration Officer'
            ],
            [
                'nama_posisi' => 'General Doctor'
            ],
            [
                'nama_posisi' => 'Dentist'
            ],
            [
                'nama_posisi' => 'Nurse'
            ],
            [
                'nama_posisi' => 'Pharmacist'
            ],
            [
                'nama_posisi' => 'Cashier'
            ],
        ];

        foreach ($positions as $item) {
            \App\Models\EmployeePosition::create($item);
        }
    }
}
