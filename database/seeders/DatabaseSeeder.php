<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        File::copyDirectory(public_path().'\images', Storage::path('public'));
        $this->call([
            VoyagerDatabaseSeeder::class,
            InfoSeeder::class,
            DiscountStatusSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ArticleTypeSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
