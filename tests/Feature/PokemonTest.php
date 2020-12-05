<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_all_pokemon()
    {
        Pokemon::factory()->count(10);

        $response = $this->getJson('/api/pokemon');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'nombre',
                        'types'
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_can_store_a_pokemon()
    {
        $response = $this->postJson('/api/pokemon', [
                'name' => 'Garchomp',
                'types' => 'dragon, ground'
            ]);
        
        $response
            ->assertStatus(201);
    }
    
    /** @test */
    public function it_failed_validation_to_store_a_pokemon()
    {
        $response = $this->postJson('/api/pokemon', [
                'name' => 'Garchomp',
            ]);
        
        $response
            ->assertStatus(422);
    }

    /** @test */
    // public function it_can_fetch_pokemon_by_types()
    // {
    // $pokemon = Pokemon::factory()->count(5);
    // $response = $this->getJson("/api/pokemon/{$pokemon[2]->types}");

    // $response
    //     ->assertStatus(200)
    //     ->assertExactJson([
    //         'data' => [
    //             'id' => $pokemon[2]->id,
    //             'name' => $pokemon[2]->name,
    //             'types' => $pokemon[2]->types
    //         ]
    //     ]);
    // }

    /** @test */
    // public function it_can_fetch_pokemon_by_name()
    // {
    // }

    /** @test */
    public function it_can_update_a_pokemon()
    {
        $pokemon = Pokemon::factory()->create();

        $response = $this->patchJson("/api/pokemon/{$pokemon->id}", [
                'name' => 'Garchomp'
            ]);
        
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'data'=> [
                    'name' => 'Garchomp',
                    'types' => $pokemon->types
                ]
            ]);
    }

    /** @test */
    public function it_can_not_delete_a_emty_pokemon()
    {
        $response = $this->deleteJson('/api/pokemon/1');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_delete_pokemon_by_id()
    {
        $pokemon = Pokemon::factory()->create();

        $response = $this->deleteJson("/api/pokemon/{$pokemon->id}");

        $response
            ->assertStatus(202);
    }
}
