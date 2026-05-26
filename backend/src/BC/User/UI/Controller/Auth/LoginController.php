<?php

namespace Src\BC\User\UI\Controller\Auth;

class LoginController {
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password_hash' => 'required|string|max:255',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Las credenciales no son correctas'], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => $user,
        ]);
    }
}