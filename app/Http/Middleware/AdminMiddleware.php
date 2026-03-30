<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
            }
            
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}