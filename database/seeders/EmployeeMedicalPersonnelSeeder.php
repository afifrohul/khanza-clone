<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeMedicalPersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_medical_personnels = [
            [
                'employee_id' => 1,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
            [
                'employee_id' => 2,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
            [
                'employee_id' => 3,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
            [
                'employee_id' => 4,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
            [
                'employee_id' => 5,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
            [
                'employee_id' => 6,
                'nip' => fake()->numerify(),
                'nik' => fake()->numerify(),
                'no_str' => fake()->numerify(),
                'no_sip' => fake()->numerify(),
                'kode_dpjp_bpjs' => fake()->numerify(),
                'ihs_practitioner_id' => fake()->numerify(),
            ],
        ];

        foreach ($employee_medical_personnels as $item) {
            \App\Models\EmployeeMedicalPersonnel::create($item);
        }
    }
}
