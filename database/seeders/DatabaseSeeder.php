<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'family' => 'admin',
            'phone' => '09123456789',
            'email' => 'admin@gmail.com',
            'isAdmin' => 1,
            'password' => Hash::make('Power@110#') ,
        ]);
    }
}
