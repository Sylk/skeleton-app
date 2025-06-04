<?php

namespace App\Providers;

use App\Contracts\RecipeRepositoryInterface;
use App\Repositories\RecipeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);
    }
}
