<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\NoCacheHeaders;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register middleware aliases
        $middleware->alias([
            'no-cache' => NoCacheHeaders::class,
        ]);

        // Append SetLocale to the web middleware group
        $middleware->web(append: [
            SetLocale::class,
        ]);

        // Define the guest middleware group
        $middleware->group('guest', [
            NoCacheHeaders::class,
            \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
        ]);

        // Define the admin middleware group
        $middleware->group('admin', [
            NoCacheHeaders::class,
            \Illuminate\Auth\Middleware\Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();