<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Product',
            'price' => 19.99,
            'description' => 'This is a sample product description.',
            'image'=>'/image/image.png',
        ]);
    }
}
