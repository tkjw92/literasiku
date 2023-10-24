<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        UserModel::insert([
            'username' => 'admin',
            'password' => 'admin',
            'first_name' => 'Administrator',
            'last_name' => '',
            'email' => 'admin@admin.com',
            'phone' => '1234567890'
        ]);
    }
}
