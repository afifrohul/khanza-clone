<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create(
            [
                'email' => 'admin@example.com',
            ]
        );
        $admin->assignRole('Admin');

        $ro = User::factory()->create(
            [
                'email' => 'ro@example.com',
            ]
        );
        $ro->assignRole('Registration Officer');
        
        $doctor = User::factory()->create(
            [
                'email' => 'doctor@example.com',
            ]
        );
        $doctor->assignRole('Doctor');

        $nurse = User::factory()->create(
            [
                'email' => 'nurse@example.com',
            ]
        );
        $nurse->assignRole('Nurse');

        $pharmacist = User::factory()->create(
            [
                'email' => 'pharmacist@example.com',
            ]
        );
        $pharmacist->assignRole('Pharmacist');

        $cashier = User::factory()->create(
            [
                'email' => 'cashier@example.com',
            ]
        );
        $cashier->assignRole('Cashier');

    }
}
