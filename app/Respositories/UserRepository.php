<?php
namespace App\Respositories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Team::insert([
            [ 'user_id'=>$user->id ],
            [ 'user_id'=>$user->id ]
        ]);

        return $user;
    }
}
