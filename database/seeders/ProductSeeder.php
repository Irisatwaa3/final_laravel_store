<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
      DB::table('products')->insert([
    [
        'id' => 1,
        'name' => 'Product 1',
        'description' => 'Description 1',
        'price' => 100.00,
        'category_id' => 1,
        'image_path' => 'images/products/product1.jpg',  // مثال لمسار الصورة
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id' => 2,
        'name' => 'Product 2',
        'description' => 'Description 2',
        'price' => 150.00,
        'category_id' => 1,
        'image_path' => 'images/products/product2.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
