<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample categories (you should have categories seeded already)
        $categoryIds = [1, 2, 3, 4, 5];

        // Add 10-12 sample products with random category associations
        for ($i = 1; $i <= 12; $i++) {
            DB::table('products')->insert([
                'product_name' => 'Product ' . $i,
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'image' => 'product_image_' . $i . '.jpg',
                'brand' => 'Brand ' . $i,
                'price' => rand(10, 1000) / 10, // Generate random prices
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
