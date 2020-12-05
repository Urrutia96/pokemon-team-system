<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonRequest;
use App\Http\Resources\Pokemon as ResourcesPokemon;
use App\Http\Resources\PokemonCollection;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PokemonCollection(Pokemon::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
    {
        return Pokemon::create($request->validated())
            ? new Response(null, 201)
            : new Response(null, 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return $pokemon->update($request->only(['name','types']))
            ? new ResourcesPokemon($pokemon)
            : new Response(null, 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Pokemon::findOrFail($id)->delete()
            ? new Response(null, 202)
            : new Response(null, 500);
    }
}
