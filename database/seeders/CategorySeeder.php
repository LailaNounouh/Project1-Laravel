<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Glam Look',
            'Haarstyling',
            'Skincare',
            'Nail art',
            'Samenwerkingen',
            'Tutorials',
            'Trends',
            'Account',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
