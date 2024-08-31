<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the ProductSeeder to seed the products table
        $this->call(ProductSeeder::class);
    }
}
