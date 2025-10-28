<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Comment;
use App\Models\Faq;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(AdminUserSeeder::class);

        $this->call([
            NewsSeeder::class,
            FaqSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            CommentSeeder::class,
        ]);

        \App\Models\Category::factory()->count(3)->create();
        \App\Models\Faq::factory()->count(6)->create();
        \App\Models\User::factory()->count(5)->create();
        \App\Models\News::factory()->count(8)->create();
        \App\Models\Comment::factory()->count(10)->create();
        \App\Models\Contact::factory()->count(4)->create();

        Category::firstOrCreate(['name' => 'Algemeen']);
        Contact::firstOrCreate([
            'name' => 'Test',
            'email' => 'test@example.com',
            'message' => 'Dit is test',
        ]);
        Comment::firstOrCreate([
            'news_id' => 1,
            'author_name' => 'Tester',
            'content' => 'Leuke post!',
        ]);
    }
}

