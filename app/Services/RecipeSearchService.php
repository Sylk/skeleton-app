<?php

namespace App\Services;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeSearchService
{
    public function search(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return Recipe::query()
            ->when($filters['author_email'] ?? null, fn(Builder $query, string $email) =>
            $query->where('author_email', $email)
            )
            ->when($filters['keyword'] ?? null, fn(Builder $query, string $keyword) =>
            $query->where(function (Builder $q) use ($keyword) {
                $keyword = strtolower($keyword);
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(ingredients) LIKE ?', ["%{$keyword}%"])
                    ->orWhereRaw('LOWER(steps) LIKE ?', ["%{$keyword}%"]);
            })
            )
            ->when($filters['ingredient'] ?? null, fn(Builder $query, string $ingredient) =>
            $query->whereRaw('LOWER(ingredients) LIKE ?', ["%".strtolower($ingredient)."%"])
            )
            ->latest('created_at')
            ->paginate($perPage);
    }
}
