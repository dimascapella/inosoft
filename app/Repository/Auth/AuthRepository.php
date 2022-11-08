<?php

namespace App\Repository\Auth;

use App\Models\User;
use JWTAuth;

class AuthRepository implements AuthRepositoryInterface{
    
    public function register(array $data){
        return $user = User::create($data);
    }

    public function login(array $data){
        return JWTAuth::attempt($data);
    }

    public function logout($token){
        return JWTAuth::invalidate($token);
    }

    public function who($token){
        return JWTAuth::authenticate($token);
    }
}