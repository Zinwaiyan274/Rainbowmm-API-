<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'user2',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('admin'),
            'role'=>    'user'
        ]);

        // Category::create([
        //     'title' => 'Health'
        // ]);

        // Category::create([
        //     'title' => 'Beauty'
        // ]);

        // Category::create([
        //     'title' => 'Knowledge'
        // ]);

        // Category::create([
        //     'title' => 'Entertainment'
        // ]);
    }
}
