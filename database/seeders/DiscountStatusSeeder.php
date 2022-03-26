<?php

namespace Database\Seeders;

use App\Models\DiscountStatus;
use Illuminate\Database\Seeder;

class DiscountStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscountStatus::insert([
            [
                'name' => 'Bronze',
                'color' => '#CD7F32',
                'min' => '0',
                'discount' => '0',
            ],
            [
                'name' => 'Silver',
                'color' => '#C0C0C0',
                'min' => '5000',
                'discount' => '5',
            ],
            [
                'name' => 'Gold',
                'color' => '#FFD700',
                'min' => '20000',
                'discount' => '10',
            ],
        ]);
    }
}
