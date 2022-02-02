<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'a.kadirov.17.06@gmail.com',
            'phone' => '+77777777777',
            'password' => Hash::make('123456789'),
        ])->media()->create([
            'name' => 'U',
            'link' => 'https://via.placeholder.com/640x480.png/00ccff?text=U',
            'extension' => 'png',
        ]);
    }
}
