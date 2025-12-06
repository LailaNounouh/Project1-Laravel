<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::factory()->count(5)->create();

        $possibleImages = ['news/sample1.jpeg', 'news/sample2.jpeg', 'news/sample3.jpeg', 'news/sample4.jpeg'];
        $imgPath = null;

        $existingImages = array_filter($possibleImages, fn($img) => Storage::disk('public')->exists($img));
        if (!empty($existingImages)) {
            $imgPath = $existingImages[array_rand($existingImages)];
        }

        News::create([
            'title' => 'GlamConnect Launch Event',
            'content' => 'Kom naar ons launch event — tips, freebies en netwerken voor studenten!',
            'image' => $imgPath,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
