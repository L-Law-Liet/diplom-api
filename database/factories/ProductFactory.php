<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    private $i = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = 'Product No' . $this->i++;
        return [
            'name' => $name,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'image' => 'https://via.placeholder.com/640x480.png/00ff99?text='.$name,
            'description' => $this->faker->text,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
