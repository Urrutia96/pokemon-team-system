<?php

use App\Http\Controllers\API\PokemonController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\API\PokemonTeamController;
use Illuminate\Support\Facades\Route;

Route::apiResource('register', RegisterController::class)->only(['store']);
Route::apiResource('pokemon', PokemonController::class);
Route::apiResource('teams', TeamController::class)->only('index');
Route::apiResource('teams.pokemon', PokemonTeamController::class);
