<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of recipes with optional search and pagination.
     */
    public function index(Request $request)
    {
        // Validate search parameters
        $request->validate([
            'author_email' => 'nullable|email',
            'keyword' => 'nullable|string|max:255',
            'ingredient' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:50',
        ]);

        // Build search parameters
        $searchParams = $request->only(['author_email', 'keyword', 'ingredient']);

        // Remove empty values
        $searchParams = array_filter($searchParams, function($value) {
            return !empty($value);
        });

        // Query recipes with search and pagination
        $recipes = Recipe::search($searchParams)
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page', 10));

        return RecipeResource::collection($recipes);
    }

    /**
     * Display the specified recipe by slug.
     */
    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }
}
