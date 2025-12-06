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


        $imgPath = 'news/sample.jpg';

        if (Storage::disk('public')->exists($imgPath)) {
            News::create([
                'title' => 'GlamConnect Launch Event',
                'content' => 'Kom naar ons launch event — tips, freebies en netwerken voor studenten!',
                'image' => $imgPath,
                'user_id' => 1,
            ]);
        } else {
            News::create([
                'title' => 'GlamConnect Launch Event',
                'content' => 'Kom naar ons launch event — tips, freebies en netwerken voor studenten!',
                'image' => null,
                'user_id' => 1,
            ]);
        }
    }
}
