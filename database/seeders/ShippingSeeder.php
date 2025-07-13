<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {DB::table('shipping')->insert([
    [
        'order_id' => 1,  // لازم يكون موجود في جدول orders
        'shipping_address' => 'Gaza',
        'shipping_date' => '2024-03-01',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);
   }
}
