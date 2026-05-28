<?php

namespace Src\BC\User\UI\Controller\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController {
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        if (!Auth::guard('web')->attempt($credentials)) {
            return response()->json(['message' => 'Las credenciales no son correctas'], 401);
        }

        $user  = Auth::guard('web')->user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => $user,
        ]);
    }
}