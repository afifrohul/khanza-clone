<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'user_id' => 1,
                'employee_position_id' => 1,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
            [
                'user_id' => 2,
                'employee_position_id' => 2,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
            [
                'user_id' => 3,
                'employee_position_id' => 3,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
            [
                'user_id' => 4,
                'employee_position_id' => 4,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
            [
                'user_id' => 5,
                'employee_position_id' => 5,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
            [
                'user_id' => 6,
                'employee_position_id' => 6,
                'gelar_depan' => fake()->title(),
                'gelar_belakang' => '',
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'no_telp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'is_active' => true
            ],
        ];

        foreach ($employees as $item) {
            \App\Models\Employee::create($item);
        }
    }
}
