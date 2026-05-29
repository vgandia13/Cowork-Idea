<?php

namespace Src\BC\User\UI\Controller\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Src\BC\User\Application\UseCase\ReadUserByEmailUseCase;


class LoginController {
    public function __construct(private readonly ReadUserByEmailUseCase $useCase) {}

    public function __invoke(Request $request):JsonResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        $user = $this->useCase->execute($credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->getPasswordHashValue())) {
            return response()->json(['message' => 'Las credenciales no son correctas'], 401);
        }

        if (!$user->getActiveValue()) {
            return response()->json(['message' => 'Usuario desactivado'], 403);
        }

        $userModel = User::where('email', $credentials['email'])->first();
        $token = JWTAuth::fromUser($userModel);

        Log::info('Login Response', ['token' => $token, 'user' => $user]);

        return response()->json([
            'token' => $token,
            'user'  => $user,
        ]);
    }
}
