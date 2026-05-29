<?php

namespace Src\BC\User\UI\Controller\Auth;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;


class LogoutController {

    public function __invoke(Request $request)
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['message' => 'No hay un token activo'], 400);
        }
        JWTAuth::invalidate($token);
        return response()->json(['message' => 'Se ha cerrado la sesion']);
    }
}