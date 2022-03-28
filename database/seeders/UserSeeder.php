<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::where('name', 'admin')->get();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@store.kz',
            'phone' => '0000000000',
            'password' => Hash::make('123456789'),
        ])->roles()->attach($roles);

        $roles = Role::where('name', 'user')->get();
        User::create([
            'name' => 'John Doe',
            'email' => 'a.kadirov.17.06@gmail.com',
            'phone' => '7777777777',
            'password' => Hash::make('123456789'),
        ])->roles()->attach($roles);

        User::create([
            'name' => 'Alish',
            'email' => 'megawin51@mail.com',
            'phone' => '7777777771',
            'password' => Hash::make('12345678'),
        ])->roles()->attach($roles);
    }
}
