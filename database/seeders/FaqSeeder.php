<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Category;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $glamLook = Category::where('name', 'Glam Look')->first();
        $account = Category::where('name', 'Account')->first();
        $tutorials = Category::where('name', 'Tutorials')->first();
        $samenwerkingen = Category::where('name', 'Samenwerkingen')->first();

        $faqs = [
            [
                'question' => 'Wat is GlamConnect?',
                'answer' => 'GlamConnect is een creatief platform waar beauty professionals hun werk tonen en connecteren.',
                'category' => $glamLook,
            ],
            [
                'question' => 'Wie kan een profiel aanmaken?',
                'answer' => 'Make-up artists, hairstylists en nail artists kunnen zich registreren.',
                'category' => $account,
            ],
            [
                'question' => 'Is GlamConnect gratis?',
                'answer' => 'Ja, GlamConnect is gratis voor creatives.',
                'category' => $account,
            ],
            [
                'question' => 'Zijn er tutorials beschikbaar?',
                'answer' => 'Ja, creators kunnen tutorials delen over make-up, haar en skincare.',
                'category' => $tutorials,
            ],
            [
                'question' => 'Hoe kan ik samenwerken met een artist?',
                'answer' => 'Gebruik het contactformulier om een samenwerking of boeking te bespreken.',
                'category' => $samenwerkingen,
            ],
        ];

        foreach ($faqs as $item) {
            if ($item['category']) {
                Faq::updateOrCreate(
                    ['question' => $item['question']],
                    [
                        'answer' => $item['answer'],
                        'category_id' => $item['category']->id,
                    ]
                );
            }
        }
    }
}
