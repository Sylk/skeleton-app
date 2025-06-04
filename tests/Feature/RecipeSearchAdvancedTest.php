<?php

namespace Tests\Feature;

use App\Facades\Recipe as RecipeFacade;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeSearchAdvancedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_uses_facade_for_recipe_operations()
    {
        Recipe::factory()->create(['name' => 'Test Recipe']);

        $results = RecipeFacade::search(['keyword' => 'test']);

        $this->assertCount(1, $results);
    }

    /** @test */
    public function it_handles_complex_search_combinations()
    {
        $testCases = [
            // [filters, expected_count, description]
            [['author_email' => 'test@example.com'], 2, 'author email only'],
            [['keyword' => 'salmon'], 1, 'keyword in name'],
            [['ingredient' => 'honey'], 1, 'ingredient search'],
            [
                ['author_email' => 'test@example.com', 'keyword' => 'salmon'],
                1,
                'author + keyword combination'
            ],
            [
                ['author_email' => 'test@example.com', 'ingredient' => 'honey'],
                1,
                'author + ingredient combination'
            ],
            [
                ['keyword' => 'salmon', 'ingredient' => 'honey'],
                1,
                'keyword + ingredient combination'
            ],
            [
                ['author_email' => 'test@example.com', 'keyword' => 'salmon', 'ingredient' => 'honey'],
                1,
                'all filters combined'
            ],
        ];

        $this->createTestRecipes();

        foreach ($testCases as [$filters, $expectedCount, $description]) {
            $response = $this->getJson('/api/recipes?' . http_build_query($filters));

            $response->assertStatus(200)
                ->assertJsonCount($expectedCount, 'data');
        }
    }

    /** @test */
    public function it_validates_search_parameters_properly()
    {
        $invalidCases = [
            ['author_email' => 'invalid-email'],
            ['per_page' => 0],
            ['per_page' => 51],
            ['keyword' => str_repeat('a', 256)],
        ];

        foreach ($invalidCases as $invalidData) {
            $response = $this->getJson('/api/recipes?' . http_build_query($invalidData));
            $response->assertStatus(422);
        }
    }

    /** @test */
    public function it_returns_consistent_pagination_structure()
    {
        Recipe::factory(25)->create();

        $response = $this->getJson('/api/recipes?per_page=10');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'slug', 'description', 'ingredients', 'steps', 'author_email']
                ],
                'links' => ['first', 'last', 'prev', 'next'],
                'meta' => [
                    'current_page', 'per_page', 'total', 'last_page',
                    'from', 'to', 'path'
                ]
            ])
            ->assertJsonCount(10, 'data')
            ->assertJsonPath('meta.total', 25)
            ->assertJsonPath('meta.last_page', 3);
    }

    /** @test */
    public function it_handles_case_insensitive_searches()
    {
        Recipe::factory()->create(['name' => 'HONEY GLAZED Salmon']);

        $testCases = ['honey', 'HONEY', 'Honey', 'gLaZeD', 'SALMON'];

        foreach ($testCases as $keyword) {
            $response = $this->getJson("/api/recipes?keyword={$keyword}");
            $response->assertJsonCount(1, 'data');
        }
    }

    /** @test */
    public function it_searches_across_all_specified_fields()
    {
        $recipe = Recipe::factory()->create([
            'name' => 'Test Name Recipe',
            'description' => 'Contains special keyword',
            'ingredients' => ['unique ingredient', 'salt'],
            'steps' => ['First step with marker', 'Second step']
        ]);

        $searchFields = [
            'Test' => 'name',
            'special' => 'description',
            'unique' => 'ingredients',
            'marker' => 'steps'
        ];

        foreach ($searchFields as $keyword => $field) {
            $response = $this->getJson("/api/recipes?keyword={$keyword}");

            $response->assertStatus(200)
                ->assertJsonCount(1, 'data')
                ->assertJsonPath('data.0.id', $recipe->id);
        }
    }

    private function createTestRecipes(): void
    {
        // Recipe matching all criteria
        Recipe::factory()->create([
            'name' => 'Honey Glazed Salmon',
            'ingredients' => ['salmon', 'honey', 'garlic'],
            'author_email' => 'test@example.com'
        ]);

        // Recipe with same author, different content
        Recipe::factory()->create([
            'name' => 'Chicken Teriyaki',
            'ingredients' => ['chicken', 'soy sauce'],
            'author_email' => 'test@example.com'
        ]);

        // Recipe with different author
        Recipe::factory()->create([
            'name' => 'Beef Stew',
            'ingredients' => ['beef', 'potatoes'],
            'author_email' => 'other@example.com'
        ]);
    }
}
