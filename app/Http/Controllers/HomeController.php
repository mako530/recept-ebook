<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = \App\Models\RecipeCategory::all();

        $topRecipes = \App\Models\Recipe::published()
            ->whereNotNull('image')
            ->limit(3)
            ->get();

        return view('home', [
            'categories' => $categories,
            'topRecipes' => $topRecipes,
        ]);
    }
}
