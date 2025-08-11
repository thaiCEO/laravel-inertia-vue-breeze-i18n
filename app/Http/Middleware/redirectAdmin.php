<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class redirectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (Auth::check() && Auth::user()->isAdmin == 1) {
            return redirect()->route('admin.dashboard')
                ->with('success', 'សូមស្វាគមន៍អ្នកបានចូលជាអ្នកគ្រប់គ្រង។');
        }
        // If the user is not an admin, continue with the request

        return $next($request);
    }
}
