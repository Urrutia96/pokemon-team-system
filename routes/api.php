<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

Route::apiResource('register', RegisterController::class)->only(['store']);
