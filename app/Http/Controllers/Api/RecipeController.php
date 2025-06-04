<?php

namespace App\Http\Controllers\Api;

use App\Contracts\RecipeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeSearchRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function __construct(
        private RecipeRepositoryInterface $recipeRepository
    ) {}

    public function index(RecipeSearchRequest $request)
    {
        $recipes = $this->recipeRepository->search(
            $request->validated(),
            $request->get('per_page', 10)
        );

        return RecipeResource::collection($recipes);
    }

    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }
}
