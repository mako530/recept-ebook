<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeGallery extends Model
{
    use HasFactory;

    protected $table = 'recipe_galleries';

    protected $fillable = [
        'recipe_id',
        'image',
        'is_published',
        'user_id',
    ];

    protected $casts = [
        'recipe_id' => 'integer',
        'is_published' => 'boolean',
        'user_id' => 'integer',
    ];

    public function recipe(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullImagePathAttribute(): string
    {
        return asset('storage/'.$this->image);
    }
}
