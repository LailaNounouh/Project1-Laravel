<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $looks = [
            [
                'title' => 'Soft Glam Look',
                'image' => 'news/sample.jpg',
                'content' => 'Soft glam met warme nude tinten, glossy lip en een natuurlijke glow. Ideaal voor events en everyday glam.',
                'created_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Bridal Glam 2025',
                'image' => 'news/sample1.jpg',
                'content' => 'Bridal look met focus op een frisse huid, zachte blush en subtiele shimmer. Waterproof finish voor een lange dag.',
                'created_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Editorial / Runway Glam',
                'image' => 'news/sample2.jpg',
                'content' => 'Editorial look met strakke eyeliner, metallic accents en high-fashion vibe. Perfect voor shoots en portfolio.',
                'created_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Clean Girl Glow',
                'image' => 'news/sample3.jpg',
                'content' => 'Minimal makeup, goede skincare finish, fluffy brows en gloss. Clean en classy.',
                'created_at' => Carbon::now()->subDays(2),
            ],
        ];

        foreach ($looks as $look) {
            News::updateOrCreate(
                ['title' => $look['title']],
                [
                    'image' => $look['image'],
                    'content' => $look['content'],
                    'created_at' => $look['created_at'],
                    'updated_at' => $look['created_at'],
                ]
            );
        }
    }
}
