<?php

namespace App\Repositories;

use App\Contracts\RecipeRepositoryInterface;
use App\Models\Recipe;
use App\Services\RecipeSearchService;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function __construct(
        private RecipeSearchService $searchService
    ) {}

    public function search(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return $this->searchService->search($filters, $perPage);
    }

    public function findBySlug(string $slug): ?Recipe
    {
        return Recipe::where('slug', $slug)->first();
    }

    public function create(array $data): Recipe
    {
        return Recipe::create($data);
    }
}
