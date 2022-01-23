<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory(50)->hasMedia(1, function (array $attributes, News $news) {
            $attributes['name'] .= $news->title;
            $attributes['link'] .= $attributes['name'];
            return $attributes;
        })->create();
    }
}
