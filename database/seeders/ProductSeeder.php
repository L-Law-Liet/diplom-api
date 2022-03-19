<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    private int $mediaCount = 8;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::copyDirectory(public_path().'\images', Storage::path('public'));
        Product::insert([
            [
                'name' => 'AI 92',
                'image' => 'products/AI92.png',
                'price' => 1.38,
                'count' => 12,
                'description' => 'The octane number is an indicator of the detonation resistance of gasoline. Gasoline AI-92 can be interpreted, its octane number is approximately 92, which was established during laboratory studies.',
                'category_id' => Category::where('name', 'Oil products')->first()->id
            ],
            [
                'name' => 'AI 95',
                'image' => 'products/AI95.png',
                'price' => 1.23,
                'count' => 12,
                'description' => 'The octane number is an indicator of the detonation resistance of gasoline. Gasoline AI-95 can be interpreted, its octane number is approximately 95, which was established during laboratory studies.',
                'category_id' => Category::where('name', 'Oil products')->first()->id
            ],
            [
                'name' => 'DT',
                'image' => 'products/DT.png',
                'price' => 1.41,
                'count' => 12,
                'description' => 'The octane number is an indicator of the detonation resistance of gasoline. Gasoline DT can be interpreted, its octane number is approximately DT, which was established during laboratory studies.',
                'category_id' => Category::where('name', 'Diesel fuels')->first()->id
            ],
        ]);
    }
}
