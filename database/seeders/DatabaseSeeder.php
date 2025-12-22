<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user aanmaken (indien nog niet bestaat)
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
            ]
        );

        // Test users
        User::factory()->count(5)->create();


        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
