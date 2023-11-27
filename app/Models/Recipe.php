<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'ingredients',
        'instructions',
        'tags',
        'image',
        'is_published',
        'user_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'tags' => 'array',
        'is_published' => 'boolean',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function ratings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RecipeRating::class);
    }

    public function galleries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RecipeGallery::class);
    }

    public function getFullImagePathAttribute(): string
    {
        return asset('storage/'.$this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query, $published = true)
    {
        return $query->where('is_published', $published);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('ingredients', 'like', '%'.$search.'%')
            ->orWhere('instructions', 'like', '%'.$search.'%');
    }
}
