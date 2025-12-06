<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsSeeder extends Seeder
{
    public function run(): void
    {

        \App\Models\News::factory()->count(5)->create();


        $images = [
            'news/sample1.jpg',
            'news/sample2.jpg',
            'news/sample3.jpg',
            'news/sample4.jpg',
        ];

        foreach ($images as $img) {
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($img)) {
                \App\Models\News::create([
                    'title' => 'GlamConnect Update',
                    'content' => 'Nieuw event, nieuwe trends en inspiratie voor studenten!',
                    'image' => $img,
                    'user_id' => 1,
                ]);
            }
        }
    }}
