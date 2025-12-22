<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{

    public function run(): void
    {dump('NewsSeeder running');

        $user = User::first(); // admin of eerste user

        if (!$user) {
            return;
        }

        $items = [
            [
                'title' => 'Soft Glam Look',
                'content' => 'Een zachte glam look met natuurlijke tinten.',
                'image' => 'news/sample.jpg',
            ],
            [
                'title' => 'Bridal Glam 2025',
                'content' => 'Trends voor bridal make-up in 2025.',
                'image' => 'news/sample1.jpg',
            ],
            [
                'title' => 'Bold Evening Look',
                'content' => 'Een krachtige avondlook met smokey eyes.',
                'image' => 'news/sample2.jpg',
            ],
        ];

        foreach ($items as $item) {
            News::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'user_id' => $user->id,
            ]);
        }
    }
}
