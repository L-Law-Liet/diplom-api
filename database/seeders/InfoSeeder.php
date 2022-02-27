<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::insert([
            [
                'key' => 'xy',
                'value' => json_encode([42.287633, 69.637922]),
            ]
        ]);
    }
}
