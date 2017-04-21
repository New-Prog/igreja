<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials  = $request->only('email', 'password');
        
        try {
            $token  = JWTAuth::attempt($credentials);
            
        } catch(JWTException $error) {
        
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        if (!$token) {
            return response()->json(['error' => 'invalid_credential'], 401);
        }
        
        return response()->json(compact('token'));
        
    }
}
