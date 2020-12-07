<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonTeamRequest;
use App\Models\Pokemon;
use App\Models\Team;
use App\Models\PokemonTeam;
use App\Respositories\PokemonTeamRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokemonTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        return $team->pokemonTeam();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonTeamRequest $request, Team $team, PokemonTeamRepository $pokemonTeamRepository)
    {
        return $pokemonTeamRepository->store($team, $request)
            ? new Response(null, 201)
            : new Response(null, 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PokemonTeam  $pokemonTeam
     * @return \Illuminate\Http\Response
     */
    public function show(PokemonTeam $pokemonTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PokemonTeam  $pokemonTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PokemonTeam $pokemonTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PokemonTeam  $pokemonTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(PokemonTeam $pokemonTeam)
    {
        //
    }
}
