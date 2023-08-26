<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
    
        $$credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {

            $token = $request->user()->createToken('authToken')->plainTextToken;
 
            return response()->json(['token' => $token, 'message' => 'Login successful'], 200);
            // return ['token' => $token->plainTextToken, 'message'=>'Login Successful'];
            // Authentication was successful
            // return response()->json(['message' => 'Login successful'], 200);
        }

        // Authentication failed
        return response()->json(['message' => 'Login failed'], 401);
    }

    public function logout(AuthLoginRequest $request)
    {
        return response($request);
        $request->user()->currentAccessToken()->delete();
        

        return response()->json(['message' => 'Logged out'], 200);
    }
}
