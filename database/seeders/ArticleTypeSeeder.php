<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Seeder;

class ArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleType::insert([
            [
                'name' => 'Mobile slider',
            ],
            [
                'name' => 'Partners',
            ],
            [
                'name' => 'About us',
            ],
            [
                'name' => 'News',
            ],
            [
                'name' => 'Home slider',
            ],
        ]);
    }
}
