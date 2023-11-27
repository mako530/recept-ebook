<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class RecipeCategory extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'recipe_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function recipes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function getFullImagePathAttribute(): string
    {
        return asset('img/'.$this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
