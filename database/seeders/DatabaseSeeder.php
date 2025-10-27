<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(AdminUserSeeder::class);


        \App\Models\Category::factory()->count(3)->create();


        \App\Models\Faq::factory()->count(6)->create();


        \App\Models\User::factory()->count(5)->create();


        \App\Models\News::factory()->count(8)->create();


        \App\Models\Comment::factory()->count(10)->create();


        \App\Models\Contact::factory()->count(4)->create();
    }
}
