<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Pagination\LengthAwarePaginator search(array $filters, int $perPage = 10)
 * @method static \App\Models\Recipe|null findBySlug(string $slug)
 * @method static \App\Models\Recipe create(array $data)
 */
class Recipe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Contracts\RecipeRepositoryInterface::class;
    }
}
