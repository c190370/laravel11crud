<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert 20 dummy records into the products table
        for ($i = 0; $i < 200; $i++) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'sku' => $faker->bothify('####??'),
                'price' => $faker->numberBetween(10000, 1000000),
                'description' => $faker->sentence,
            ]);
        }
    }
}
