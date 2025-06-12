<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $user = auth()->user();

        //create the token for the user sending the request
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            //to extract the name after loging
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        //delete the current existing access token
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        if ($user) {
            return response()->json([
                'user' => $user,
                'access_token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        } else {
            return response()->json(['message' => 'No User Found'], 401);
        }
    }
}
