<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_methods = [
            [
                'name' => 'CASH'
            ],
            [
                'name' => 'QRIS'
            ],
            [
                'name' => 'Transfer Bank'
            ],
            [
                'name' => 'BPJS'
            ],
        ];

        foreach ($payment_methods as $item) {
            \App\Models\PatientCategory::create($item);
        }
    }
}
