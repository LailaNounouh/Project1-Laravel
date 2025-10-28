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

        $items = [
            ['question' => 'Hoe maak ik een account?', 'answer' => 'Klik op Register en vul je gegevens in.'],
            ['question' => 'Ik ben mijn wachtwoord vergeten', 'answer' => 'Gebruik “Forgot your password?” op de loginpagina.'],
            ['question' => 'Wie kan nieuws posten?', 'answer' => 'Alleen admins kunnen nieuws toevoegen en beheren.'],
        ];

        foreach ($items as $data) {
            Faq::firstOrCreate(
                ['question' => $data['question']],
                ['answer' => $data['answer']]
            );
        }

        $this->call([
            FaqSeeder::class,
        ]);
    }
}
