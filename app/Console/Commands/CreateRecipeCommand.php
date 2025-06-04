<?php

namespace App\Console\Commands;

use App\Models\Recipe;
use Illuminate\Console\Command;

class CreateRecipeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recipe:create
                           {name : The name of the recipe}
                           {author_email : The author\'s email address}
                           {--description= : The recipe description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new recipe interactively';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $authorEmail = $this->argument('author_email');
        $description = $this->option('description') ?? $this->ask('Enter recipe description');

        // Get ingredients
        $ingredients = [];
        $this->info('Enter ingredients (press enter with empty line to finish):');
        while (true) {
            $ingredient = $this->ask('Ingredient');
            if (empty($ingredient)) {
                break;
            }
            $ingredients[] = $ingredient;
        }

        // Get steps
        $steps = [];
        $this->info('Enter cooking steps (press enter with empty line to finish):');
        $stepNumber = 1;
        while (true) {
            $step = $this->ask("Step {$stepNumber}");
            if (empty($step)) {
                break;
            }
            $steps[] = $step;
            $stepNumber++;
        }

        // Create the recipe
        $recipe = Recipe::create([
            'name' => $name,
            'description' => $description,
            'ingredients' => $ingredients,
            'steps' => $steps,
            'author_email' => $authorEmail,
        ]);

        $this->info("Recipe '{$recipe->name}' created successfully!");
        $this->info("Slug: {$recipe->slug}");
    }
}
