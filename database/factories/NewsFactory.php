<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;
use App\Models\User;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        $title = $this->faker->sentence(mt_rand(4, 7));

        return [
            'title'      => $title,
            'content'    => $this->faker->paragraphs(mt_rand(3, 6), true),
            'image'      => null,
            'user_id'    => User::query()->inRandomOrder()->value('id') ?? 1,
            'created_at' => now()->subDays(rand(0, 30)),
            'updated_at' => now(),
        ];
    }
}
