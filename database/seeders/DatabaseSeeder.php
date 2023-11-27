<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RecipeCategorySeeder::class);
        // $this->call(RecipeRatingSeeder::class);
        // $this->call(RecipeGallerySeeder::class);
        // $this->call(RecipeIngredientSeeder::class);
        // $this->call(RecipeNeedSeeder::class);
        // $this->call(RecipeTagSeeder::class);
        // $this->call(RecipeTagSeeder::class);
        // $this->call(RecipeTagSeeder::class);
    }
}
