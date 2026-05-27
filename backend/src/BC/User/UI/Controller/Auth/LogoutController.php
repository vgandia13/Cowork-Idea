<?php

namespace Src\BC\User\UI\Controller\Auth;
use Illuminate\Http\Request;

class LogoutController {

    public function __invoke(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Se ha cerrado la sesion']);
    }
}