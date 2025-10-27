<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'question' => 'Hoe kan ik registreren?',
            'answer' => 'Klik op de register-knop en volg de instructies.',
            'category_id' => 1,
        ]);
    }
}
