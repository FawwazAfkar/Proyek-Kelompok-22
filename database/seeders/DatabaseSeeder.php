<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Waz',
            'email' => 'waz@gmail.com',
            'usertype' => 'user',
            'password' => Hash::make('password'),
            'foto' => '/storage/images/default.png',
            'kartu_identitas' => NULL
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'usertype' => 'admin',
            'password' => Hash::make('admin123'),
            'foto' => '/storage/images/default.png',
            'kartu_identitas' => NULL
        ]);

    }
}
