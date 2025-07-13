<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('customers')->insert([
    [
        'id' => 1,
        'name' => 'Customer 1',
        'email' => 'customer1@example.com',
        'password' => bcrypt('password'),
        'phone' => '0599999999',
        'role'=> 'customer',
        'created_at' => now(),
        'updated_at' => now(),
    ] ,
      [
        'id' => 2,
        'name' => 'admin 1',
        'email' => 'admin@admin.com',
        'password' => bcrypt('password'),
        'phone' => '0599999999',
        'role'=> 'admin',
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    }
}
