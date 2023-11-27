<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function show(Recipe $recipe)
    {
        if ($recipe->is_published === false && auth()->check() && auth()->id() !== $recipe->user_id) {
            return redirect()->route('home');
        }

        return view('recipe', [
            'category' => $recipe->category,
            'recipe' => $recipe,
        ]);
    }

    public function create()
    {
        $categories = \App\Models\RecipeCategory::all();

        return view('recipe-create', [
            'categories' => $categories,
        ]);
    }

    public function store(\App\Http\Requests\RecipeRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = $request->user()->id;

        if ($validated['image'] ?? false) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe = Recipe::create($validated);

        return redirect()->route('recipe.show', $recipe);
    }

    public function edit(Request $request, Recipe $recipe)
    {
        if ($request->user()->cannot('update', $recipe)) {
            return redirect()->route('home');
        }

        $categories = \App\Models\RecipeCategory::all();

        return view('recipe-edit', [
            'recipe' => $recipe,
            'categories' => $categories,
        ]);
    }

    public function update(\App\Http\Requests\RecipeRequest $request, Recipe $recipe)
    {
        if ($request->user()->cannot('update', $recipe)) {
            return redirect()->route('home');
        }

        $recipe->update($request->validated());

        return redirect()->route('recipe.show', $recipe);
    }

    public function destroy(Request $request, Recipe $recipe)
    {
        if ($request->user()->cannot('delete', $recipe)) {
            return redirect()->route('home');
        }

        $recipe->delete();

        return redirect()->route('home');
    }
}
