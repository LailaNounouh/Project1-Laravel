<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Admin account: credentials come from .env (see AdminUserSeeder), not from source code.
        $this->call(AdminUserSeeder::class);

        User::factory()->count(5)->create();

        $this->call([
            CategorySeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,

        ]);

        $categoryIds = Category::pluck('id')->toArray();

        User::all()->each(function ($user) use ($categoryIds) {
            $user->categories()->sync(
                collect($categoryIds)
                    ->shuffle()
                    ->take(rand(1, 3))
                    ->values()
                    ->all()
            );
        });
    }
}
