<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payers = [
            [
                'name' => 'Pembayaran Pribadi'
            ],
            [
                'name' => 'BPJS Kesehatan'
            ],
        ];

        foreach ($payers as $item) {
            \App\Models\Payer::create($item);
        }
    }
}
