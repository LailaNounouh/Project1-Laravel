<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();

        News::create([
            'title' => 'Welkom bij ons project!',
            'content' => 'Dit is een test nieuwsitem.',
            'user_id' => $admin->id,
        ]);
    }
}
