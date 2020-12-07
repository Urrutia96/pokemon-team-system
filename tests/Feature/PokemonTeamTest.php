<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use App\Models\PokemonTeam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PokemonTeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function add_pokemon_to_first_team()
    {
        $this->postJson('/api/register', [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'password',
                'password_confirmation'=> 'password'
            ]);
        
        $pokemon = Pokemon::factory()->create();

        $pt = PokemonTeam::factory()
            ->count(4)
            ->for(Pokemon::factory())
            ->create();

        $response = $this->postJson('/api/teams/1/pokemon', [
            'pokemon_id'=> $pokemon->id
        ])->dump();

        $response->assertStatus(201);
    }
    
    /** @test */
    public function cant_add_more_than_2_same_pokemon_to_first_team()
    {
        $this->postJson('/api/register', [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'password',
                'password_confirmation'=> 'password'
            ]);
        
        $pokemon = Pokemon::factory()->create();

        $pt = PokemonTeam::factory()
            ->count(3)
            ->for(Pokemon::factory())
            ->create();

        $this->postJson('/api/teams/1/pokemon', [
            'pokemon_id'=> $pokemon->id
        ]);

        $response = $this->postJson('/api/teams/1/pokemon', [
            'pokemon_id'=> $pokemon->id
        ]);

        $response->assertStatus(422);
    }
    
    /** @test */
    public function cant_add_pokemon_to_first_team()
    {
        $this->postJson('/api/register', [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'password',
                'password_confirmation'=> 'password'
            ]);
        
        $pokemon = Pokemon::factory()->create();

        PokemonTeam::factory()
            ->count(6)
            ->for(Pokemon::factory())
            ->create();

        $response = $this->postJson('/api/teams/1/pokemon', [
            'pokemon_id'=> $pokemon->id
        ]);

        $response->assertStatus(422);
    }
}
