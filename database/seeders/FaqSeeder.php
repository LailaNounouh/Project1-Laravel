<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Category;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::firstOrCreate(['name' => 'Algemeen']);

        Faq::firstOrCreate(
            ['question' => 'Hoe kan ik registreren?'],
            [
                'answer' => 'Klik op de register-knop en volg de instructies.',
                'category_id' => $category->id,
            ]
        );

        $items = [
            [
                'question' => 'Hoe maak ik een account?',
                'answer' => 'Klik op Register en vul je gegevens in.',
            ],
            [
                'question' => 'Ik ben mijn wachtwoord vergeten',
                'answer' => 'Gebruik “Forgot your password?” op de loginpagina.',
            ],
            [
                'question' => 'Wie kan nieuws posten?',
                'answer' => 'Alleen admins kunnen nieuws toevoegen en beheren.',
            ],
        ];

        foreach ($items as $data) {
            Faq::firstOrCreate(
                ['question' => $data['question']],
                [
                    'answer' => $data['answer'],
                    'category_id' => $category->id,
                ]
            );
        }
    }
}

