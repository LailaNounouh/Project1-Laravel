<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Category;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $algemeen = Category::where('name', 'Algemeen')->first();
        $profielen = Category::where('name', 'Profielen')->first();
        $accounts = Category::where('name', 'Accounts')->first();
        $samenwerkingen = Category::where('name', 'Samenwerkingen')->first();

        $faqs = [
            [
                'question' => 'Wat is GlamConnect?',
                'answer' => 'GlamConnect is een creatief platform waar make-up artists, hairstylists en andere creatives hun werk tonen en connecteren.',
                'category_id' => $algemeen->id,
            ],
            [
                'question' => 'Wie kan een profiel aanmaken?',
                'answer' => 'Iedere creatieve professional zoals make-up artists, hairstylists en nail artists kan zich registreren.',
                'category_id' => $profielen->id,
            ],
            [
                'question' => 'Is GlamConnect gratis?',
                'answer' => 'Ja, GlamConnect is volledig gratis voor creatives.',
                'category_id' => $accounts->id,
            ],
            [
                'question' => 'Hoe kan ik samenwerken met een artist?',
                'answer' => 'Gebruik het contactformulier om een samenwerking of boeking te bespreken.',
                'category_id' => $samenwerkingen->id,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
    }
}
