<?php

namespace Src\BC\User\UI\Controller\Auth;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;


class LogoutController {

    public function __invoke(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Se ha cerrado la sesion']);
    }
}