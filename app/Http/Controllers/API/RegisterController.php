<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Respositories\UserRepository;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request, UserRepository $userRepository)
    {
        return $userRepository->store($request)
            ? new Response(null, 201)
            : new Response(null, 500);
    }
}
