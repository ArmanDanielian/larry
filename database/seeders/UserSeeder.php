<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::query()->updateOrCreate([
            'name' => 'Arman',
            'email' => 'armanndanielian@gmail.com',
            'password' => Hash::make('1234567890arman'),
        ]);

        User::query()->updateOrCreate([
            'name' => 'AleksHR',
            'email' => 'aleks@gmail.com',
            'password' => Hash::make('1234567890aleks'),
        ]);

    }
}
