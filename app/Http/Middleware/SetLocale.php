<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Daftar locale yang valid
        $validLocales = ['id', 'en'];
        
        // Ambil locale dari session, default ke 'id'
        $locale = Session::get('locale', 'id');
        
        // Validasi locale
        if (!in_array($locale, $validLocales)) {
            $locale = 'id';
            Session::put('locale', $locale);
        }
        
        Log::info('SetLocale middleware: Locale saat ini adalah ' . $locale);
        App::setLocale($locale);
        Log::info('SetLocale middleware: App locale setelah diset adalah ' . App::getLocale()); // Debugging tambahan
        
        return $next($request);
    }
}