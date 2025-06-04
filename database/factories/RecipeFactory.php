<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ingredients = [
            'chicken breast', 'olive oil', 'garlic', 'onion', 'tomatoes',
            'bell peppers', 'mushrooms', 'cheese', 'herbs', 'spices',
            'potatoes', 'carrots', 'celery', 'broth', 'wine'
        ];

        $steps = [
            'Preheat oven to 350°F',
            'Prepare ingredients by washing and chopping',
            'Heat oil in a large pan',
            'Cook until golden brown',
            'Add seasonings and mix well',
            'Transfer to baking dish',
            'Bake for 25-30 minutes',
            'Let rest before serving'
        ];

        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'ingredients' => $this->faker->randomElements($ingredients, $this->faker->numberBetween(4, 8)),
            'steps' => $this->faker->randomElements($steps, $this->faker->numberBetween(5, 8)),
            'author_email' => $this->faker->email(),
        ];
    }
}
