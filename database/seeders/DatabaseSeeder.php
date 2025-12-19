<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::firstOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
            ]
        );


        User::factory()->count(5)->create();


        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            FaqSeeder::class,
            NewsSeeder::class,
            ContactSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
