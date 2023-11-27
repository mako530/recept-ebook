<?php

namespace App\Http\Controllers;

class RecipeCategoryController extends Controller
{
    public function show(\App\Models\RecipeCategory $category)
    {
        $category->load('recipes');

        return view('category', [
            'category' => $category,
        ]);
    }
}
