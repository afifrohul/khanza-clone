<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Registration Officer'
            ],
            [
                'name' => 'Doctor'
            ],
            [
                'name' => 'Nurse'
            ],
            [
                'name' => 'Pharmacist'
            ],
            [
                'name' => 'Cashier'
            ],
        ];

        foreach ($roles as $item) {
            \Spatie\Permission\Models\Role::create($item);
        }
    }
}
