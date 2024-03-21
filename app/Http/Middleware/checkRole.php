<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // $user = Auth::user();

        // if (!$user) {
        //     return redirect()->route('login')->with('failed', 'Tolong Login Terlebih Dahulu');
        // }

        // if (in_array($user->role, $roles)) {
        //     return $next($request);
        // }

        // return redirect('/')->with('failed', 'tidak memiliki akses');
    }
}
