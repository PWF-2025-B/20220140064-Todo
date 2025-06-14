<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Muhammad Dhafa',
            'email' => 'dhafa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => false,
        ]);

        User::factory(10)->create();
        $defaultTitles = ['Category 1', 'Category 2', 'Category 3'];
        foreach (\App\Models\User::all() as $user) {
            foreach ($defaultTitles as $title) {
                \App\Models\Category::create([
                    'title' => $title,
                    'user_id' => $user->id,
                ]);
            }
        }
        Todo::factory(20)->create();
    }
}
