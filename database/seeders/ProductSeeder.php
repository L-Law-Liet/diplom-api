<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

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
        Product::factory(50)->hasMedia($this->mediaCount, function (array $attributes, Product $product) {
            $attributes['name'] .= $product->name;
            return $attributes;
        })->create();
    }
}
