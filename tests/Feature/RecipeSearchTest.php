<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeSearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test recipes
        Recipe::create([
            'name' => 'Honey Glazed Salmon',
            'description' => 'Delicious salmon with honey glaze',
            'ingredients' => ['salmon', 'honey', 'garlic', 'soy sauce'],
            'steps' => ['Preheat oven to 400F', 'Mix glaze ingredients', 'Cook salmon until done'],
            'author_email' => 'chef@example.com'
        ]);

        Recipe::create([
            'name' => 'Potato Scallop Gratin',
            'description' => 'Creamy potato dish with scallops',
            'ingredients' => ['potatoes', 'scallops', 'cream', 'cheese'],
            'steps' => ['Slice potatoes', 'Layer ingredients', 'Bake'],
            'author_email' => 'chef@example.com'
        ]);

        Recipe::create([
            'name' => 'Beef Stew',
            'description' => 'Hearty beef stew with vegetables',
            'ingredients' => ['beef', 'potatoes', 'carrots', 'onions'],
            'steps' => ['Brown meat', 'Add vegetables', 'Simmer'],
            'author_email' => 'cook@different.com'
        ]);
    }

    /** @test */
    public function it_can_list_all_recipes()
    {
        $response = $this->getJson('/api/recipes');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'slug',
                        'description',
                        'ingredients',
                        'steps',
                        'author_email',
                        'created_at',
                        'updated_at'
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_can_search_by_author_email_exact_match()
    {
        $response = $this->getJson('/api/recipes?author_email=chef@example.com');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data');

        $recipes = $response->json('data');
        foreach ($recipes as $recipe) {
            $this->assertEquals('chef@example.com', $recipe['author_email']);
        }
    }

    /** @test */
    public function it_can_search_by_keyword_in_name()
    {
        $response = $this->getJson('/api/recipes?keyword=salmon');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Honey Glazed Salmon');
    }

    /** @test */
    public function it_can_search_by_keyword_in_description()
    {
        $response = $this->getJson('/api/recipes?keyword=creamy');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Potato Scallop Gratin');
    }

    /** @test */
    public function it_can_search_by_keyword_in_ingredients()
    {
        $response = $this->getJson('/api/recipes?keyword=honey');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Honey Glazed Salmon');
    }

    /** @test */
    public function it_can_search_by_keyword_in_steps()
    {
        // Let's use a keyword we know exists in the test data
        $response = $this->getJson('/api/recipes?keyword=oven');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Honey Glazed Salmon');
    }

    /** @test */
    public function it_can_search_by_ingredient_partial_match()
    {
        $response = $this->getJson('/api/recipes?ingredient=potato');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data');

        $recipeNames = collect($response->json('data'))->pluck('name')->toArray();
        $this->assertContains('Potato Scallop Gratin', $recipeNames);
        $this->assertContains('Beef Stew', $recipeNames);
    }

    /** @test */
    public function it_can_combine_search_parameters_with_and_logic()
    {
        $response = $this->getJson('/api/recipes?author_email=chef@example.com&ingredient=potato&keyword=scallop');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Potato Scallop Gratin')
            ->assertJsonPath('data.0.author_email', 'chef@example.com');
    }

    /** @test */
    public function it_returns_empty_results_when_no_matches_found()
    {
        $response = $this->getJson('/api/recipes?keyword=nonexistent');

        $response->assertStatus(200)
            ->assertJsonCount(0, 'data');
    }

    /** @test */
    public function it_can_get_single_recipe_by_slug()
    {
        $recipe = Recipe::first();

        $response = $this->getJson("/api/recipes/{$recipe->slug}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'slug',
                    'description',
                    'ingredients',
                    'steps',
                    'author_email',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJsonPath('data.slug', $recipe->slug);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_recipe_slug()
    {
        $response = $this->getJson('/api/recipes/nonexistent-recipe');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_validates_search_parameters()
    {
        $response = $this->getJson('/api/recipes?author_email=invalid-email');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['author_email']);
    }

    /** @test */
    public function it_supports_pagination()
    {
        // Create more recipes to test pagination
        Recipe::factory(15)->create();

        $response = $this->getJson('/api/recipes?per_page=5');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'data',
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next'
                ],
                'meta' => [
                    'current_page',
                    'per_page',
                    'total'
                ]
            ]);
    }
}
