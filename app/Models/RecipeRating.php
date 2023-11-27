<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeRating extends Model
{
    use HasFactory;

    protected $table = 'recipe_ratings';

    protected $fillable = [
        'recipe_id',
        'user_id',
        'rating',
        'comment',
    ];

    protected $casts = [
        'recipe_id' => 'integer',
        'user_id' => 'integer',
        'rating' => 'integer',
    ];

    public function recipe(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
