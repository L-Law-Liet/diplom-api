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
            'name' => 'Admin',
            'email' => 'admin@store.kz',
            'phone' => '+00000000000',
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'a.kadirov.17.06@gmail.com',
            'phone' => '+77777777777',
            'password' => Hash::make('123456789'),
        ])->media()->create([
            'name' => 'U',
            'link' => 'https://via.placeholder.com/640x480.png/00ccff?text=JD',
            'extension' => 'png',
        ]);

        User::create([
            'name' => 'Alish',
            'email' => 'megawin51@mail.com',
            'phone' => '+77777777771',
            'password' => Hash::make('123456789'),
        ])->media()->create([
            'name' => 'Alish',
            'link' => 'https://via.placeholder.com/640x480.png/00ccff?text=Alish',
            'extension' => 'png',
        ]);
    }
}
