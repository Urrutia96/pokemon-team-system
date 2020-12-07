<?php

namespace Database\Factories;

use App\Models\Pokemon;
use App\Models\PokemonTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PokemonTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_id' => 1,
        ];
    }
}
