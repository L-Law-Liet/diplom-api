<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * @var int
     */
    private int $count = 3;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Media::MORPH_MODELS as $morph) {
            $model = app()->make($morph);
            $mediaCount = ($model->first()->media instanceof Collection) ? $this->count : 1;
            Media::factory($mediaCount)->for($model->all(), 'media')->definition()->create();
        }
    }
}
