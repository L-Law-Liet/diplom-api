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
        $dir = 'infos/';
        Info::insert([
            [
                'name' => 'Company name',
                'key' => 'company',
                'value' => 'Standard Oil Qazaqstan',
            ],
            [
                'name' => 'Place',
                'key' => 'xy',
                'value' => json_encode([42.287633, 69.637922]),
            ],
            [
                'name' => 'Instagram link',
                'key' => 'instagram',
                'value' => 'https://www.instagram.com/razor/',
            ],
            [
                'name' => 'Facebook link',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com/tanuki.kz',
            ],
            [
                'name' => 'Phone number',
                'key' => 'tel',
                'value' => '8 (777) 355 32 50',
            ],
            [
                'name' => 'Email',
                'key' => 'email',
                'value' => 'Eshatyrov@inbox.ru',
            ],
            [
                'name' => 'Address',
                'key' => 'address',
                'value' => 'Address: Shymkent city, Enbekshi district, Residential area Zhuldyz, d.27/10',
            ],
        ]);
        Info::insert([
            [
                'name' => 'Logo',
                'key' => 'logo',
                'type' => 'image',
                'value' => $dir.'logo.png',
            ],
        ]);
    }
}
