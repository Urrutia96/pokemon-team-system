<?php

namespace App\Respositories;

use App\Models\Pokemon;
use App\Models\PokemonTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokemonTeamRepository
{
    public function store(Team $team, Request $request)
    {
        $pt = $team->pokemonTeam();
        
        if ($pt->count()>=6) {
            return false;
        }

        $pokemont = PokemonTeam::where('team_id', $team->id)
            ->select('pokemon_id')
            ->orderBy('pokemon_id')
            ->get();

        $repeatSame = PokemonTeam::where('team_id', $team->id)->where('pokemon_id', $request->pokemon_id)->get();

        if (count($repeatSame)>=1) {
            return false;
        }

        $pokemonTeam = PokemonTeam::create([
            'team_id' => $team->id,
            'pokemon_id'=> $request->pokemon_id
        ]);

        return $pokemonTeam;
    }
}
