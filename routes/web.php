<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

\Illuminate\Support\Facades\Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', function () {
    auth()->logout();

    return redirect()->route('home');
})->name('logout');

Route::get('kategoria/{category}', [\App\Http\Controllers\RecipeCategoryController::class, 'show'])->name('category.show');

Route::get('recept/{recipe}', [\App\Http\Controllers\RecipeController::class, 'show'])->name('recipe.show');
Route::get('recept', [\App\Http\Controllers\RecipeController::class, 'create'])->middleware('auth')->name('recipe.create');
Route::post('recept', [\App\Http\Controllers\RecipeController::class, 'store'])->middleware('auth')->name('recipe.store');
Route::get('recept/{recipe}/szerkesztes', [\App\Http\Controllers\RecipeController::class, 'edit'])->middleware('auth')->name('recipe.edit');
Route::post('recept/{recipe}/szerkesztes', [\App\Http\Controllers\RecipeController::class, 'update'])->middleware('auth')->name('recipe.update');
Route::post('recept/{recipe}/torles', [\App\Http\Controllers\RecipeController::class, 'destroy'])->middleware('auth')->name('recipe.destroy');

Route::get('profil/', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
