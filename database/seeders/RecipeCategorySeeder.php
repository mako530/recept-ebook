<?php

namespace Database\Seeders;

use App\Models\RecipeCategory;
use Illuminate\Database\Seeder;

class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Előétel, Főétel, Desszertek, Leves, (Hal étel, Vegetáriánus ételek)
        $categories = [
            [
                'name' => 'Előétel',
                'description' => 'Előételek a világ minden tájáról',
                'image' => 'recipe_categories/1.png',
            ],
            [
                'name' => 'Főétel',
                'description' => 'Főételek a világ minden tájáról',
                'image' => 'recipe_categories/2.png',
            ],
            [
                'name' => 'Desszertek',
                'description' => 'Desszertek',
                'image' => 'recipe_categories/3.png',
            ],
            [
                'name' => 'Leves',
                'description' => 'Leves',
                'image' => 'recipe_categories/4.png',
            ],
            [
                'name' => 'Hal étel',
                'description' => 'Hal étel',
                'image' => 'recipe_categories/5.png',
            ],
            [
                'name' => 'Vegetáriánus ételek',
                'description' => 'Vegetáriánus ételek',
                'image' => 'recipe_categories/6.png',
            ],
        ];

        foreach ($categories as $category) {
            RecipeCategory::create($category);
        }
    }
}
