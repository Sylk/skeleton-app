<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'ingredients',
        'steps',
        'author_email',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($recipe) {
            if (empty($recipe->slug) || $recipe->isDirty('name')) {
                $recipe->slug = static::generateUniqueSlug($recipe->name);
            }
        });
    }

    protected static function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function scopeByAuthor($query, string $email)
    {
        return $query->where('author_email', $email);
    }

    public function scopeWithKeyword($query, string $keyword)
    {
        $keyword = strtolower($keyword);

        return $query->where(function ($q) use ($keyword) {
            $q->whereRaw('LOWER(name) LIKE ?', ["%{$keyword}%"])
                ->orWhereRaw('LOWER(description) LIKE ?', ["%{$keyword}%"])
                ->orWhereRaw('LOWER(ingredients) LIKE ?', ["%{$keyword}%"])
                ->orWhereRaw('LOWER(steps) LIKE ?', ["%{$keyword}%"]);
        });
    }

    public function scopeWithIngredient($query, string $ingredient)
    {
        $ingredient = strtolower($ingredient);

        return $query->whereRaw('LOWER(ingredients) LIKE ?', ["%{$ingredient}%"]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
