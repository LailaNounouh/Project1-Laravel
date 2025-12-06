<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        $titles = [
            'Nieuwe workshops aankondiging',
            'Tips voor studenten bij GlamConnect',
            'Update: Openingstijden tijdens examenperiode',
            'Belangrijke mededeling over events',
            'Succesvolle netwerkevent afgelopen week'
        ];

        $contents = [
            'Vandaag delen we enkele handige tips voor studenten om hun netwerk uit te breiden en nieuwe skills te leren.',
            'Mis het niet: onze aankomende workshops bieden praktische ervaring in verschillende gebieden.',
            'We hebben enkele wijzigingen doorgevoerd in de openingstijden. Controleer de kalender voor de laatste updates.',
            'Onze community groeit elke dag! Doe mee en ontmoet gelijkgestemde studenten tijdens onze events.',
            'Het afgelopen netwerkevent was een groot succes. Bekijk de foto\'s en verhalen van de dag!'
        ];

        $title = $this->faker->randomElement($titles);
        $content = $this->faker->randomElement($contents);

        // Random afbeelding of geen afbeelding
        $images = [null, 'news/sample1.jpeg', 'news/sample2.jpeg', 'news/sample3.jpeg', 'news/sample4.jpeg'];
        $image = $this->faker->randomElement($images);

        return [
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'user_id' => 1,
            'created_at' => now()->subDays(rand(0,30)),
            'updated_at' => now(),
        ];
    }
}

