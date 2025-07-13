<?php

namespace Database\Seeders;
use Database\Seeders\ProductSeeder;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



       $this->call([
    CategorySeeder::class,   // قبل المنتجات
    CustomerSeeder::class,   // قبل الطلبات
    ProductSeeder::class,    // قبل عناصر الطلب
    OrderSeeder::class,      // بعد العملاء والمنتجات
    PaymentSeeder::class,    // بعد الطلبات (عادة)
    ShippingSeeder::class,   // بعد الطلبات (عادة)
    OrderItemSeeder::class,  // بعد الطلبات والمنتجات
]);

    }
}
