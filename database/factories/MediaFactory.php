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
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->i++,
            'count' => rand(100, 200),
            'link' => 'https://via.placeholder.com/720x480.png/777?text=',
            'extension' => 'png',
        ];
    }
}
