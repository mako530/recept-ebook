<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    use HasFactory;

    protected $table = 'recipe_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    public function recipes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function getFullImagePathAttribute(): string
    {
        return asset('storage/'.$this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
