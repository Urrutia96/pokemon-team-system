<?php

namespace App\Respositories;

use App\Http\Resources\PokemonCollection;
use App\Http\Resources\Pokemon as ResourcePokemon;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonRepository
{
    public function show(Request $request)
    {
        if ($request->filled('name')) {
            return new PokemonCollection(Pokemon::where('name', 'like', $request->name)->get());
        }

        if ($request->filled('types')) {
            return new PokemonCollection(Pokemon::where('types', 'like', $request->types)->get());
        }

        return new PokemonCollection(Pokemon::all());
    }
}
