<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek user login DAN punya role yang sesuai
        if (!Auth::check() || $request->user()->role !== $role) {
            abort(403, 'Akses ditolak. Perlu role: ' . $role);
        }

        return $next($request);
    }
}
