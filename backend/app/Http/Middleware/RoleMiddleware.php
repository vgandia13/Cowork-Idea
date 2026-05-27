<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles)
{
    if (!in_array(strtolower($request->user()?->role), array_map('strtolower', $roles))) {
        return response()->json(['message' => 'Forbidden'], 403);
    }
    return $next($request);
}
}