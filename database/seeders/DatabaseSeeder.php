<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::firstOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
            ]
        );


        User::factory()->count(5)->create();


        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
            CommentSeeder::class,
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
