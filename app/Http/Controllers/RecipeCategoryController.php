<?php

namespace App\Http\Controllers;

class RecipeCategoryController extends Controller
{
    public function show(\App\Models\RecipeCategory $category)
    {
        return view('category', [
            'category' => $category,
            'recipes' => $category->recipes()->published()->get(),
        ]);
    }
}
