<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('payments')->insert([
    [
        'order_id' => 1,  // لازم يكون موجود في جدول orders
        'amount' => 250.5,
        'payment_date' => '2024-03-01',
        'payment_method' => 'methods payment',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
