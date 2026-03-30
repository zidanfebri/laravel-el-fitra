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
        
        // AMBIL DARI SESSION, JIKA KOSONG GUNAKAN DEFAULT DARI config/app.php (yang sudah Anda ganti ke 'en')
        $locale = Session::get('locale', config('app.locale'));
        
        // Validasi locale: Jika tidak valid, paksa ke 'en'
        if (!in_array($locale, $validLocales)) {
            $locale = 'en'; // Ubah default fallback di sini menjadi en
            Session::put('locale', $locale);
        }
        
        Log::info('SetLocale middleware: Locale saat ini adalah ' . $locale);
        App::setLocale($locale);
        
        return $next($request);
    }
}