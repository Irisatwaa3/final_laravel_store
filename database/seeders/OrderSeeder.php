<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
    [
        'id' => 1,
        'customer_id' => 1,
        'order_date' => '2024-03-01',
        'status' => 'Now',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id' => 2,
        'customer_id' => 1,
        'order_date' => '2024-03-02',
        'status' => 'Completed',
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    }
}
