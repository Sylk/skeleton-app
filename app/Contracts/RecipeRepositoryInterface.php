<?php

namespace App\Contracts;

use App\Models\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;

interface RecipeRepositoryInterface
{
    public function search(array $filters, int $perPage = 10): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Recipe;

    public function create(array $data): Recipe;
}
