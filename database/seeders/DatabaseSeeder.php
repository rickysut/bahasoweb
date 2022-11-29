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
            'name' => 'Author 1',
            'email' => 'author1@email.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Author 2',
            'email' => 'author2@email.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Author 3',
            'email' => 'author3@email.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        \App\Models\User::factory(10)->create();
        
    }
}
