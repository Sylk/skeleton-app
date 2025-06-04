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

    /**
     * Boot the model and set up event listeners
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug when creating/updating
        static::saving(function ($recipe) {
            if (empty($recipe->slug) || $recipe->isDirty('name')) {
                $recipe->slug = static::generateUniqueSlug($recipe->name);
            }
        });
    }

    /**
     * Generate a unique slug based on the name
     */
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

    /**
     * Scope for searching recipes
     */
    public function scopeSearch($query, array $params)
    {
        // Author email - exact match
        if (!empty($params['author_email'])) {
            $query->where('author_email', $params['author_email']);
        }

        // Keyword - search across name, description, ingredients, steps
        if (!empty($params['keyword'])) {
            $keyword = strtolower($params['keyword']);
            $query->where(function ($q) use ($keyword) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(ingredients) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(steps) LIKE ?', ["%{$keyword}%"]);
            });
        }

        // Ingredient - partial match in ingredients
        if (!empty($params['ingredient'])) {
            $ingredient = strtolower($params['ingredient']);
            $query->whereRaw('LOWER(ingredients) LIKE ?', ["%{$ingredient}%"]);
        }

        return $query;
    }

    /**
     * Get route key name for route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
