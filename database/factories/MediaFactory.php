<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;
    private $i = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Image #' . $this->i++,
            'link' => $this->faker->imageUrl,
            'extension' => 'fake',
            'product_id' => Product::inRandomOrder()->first()->id
        ];
    }
}
