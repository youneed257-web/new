<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // -------------------------------------------------------
        // Middleware Aliases
        // Use these short names in your routes file
        // -------------------------------------------------------
        $middleware->alias([
            'auth'      => \App\Http\Middleware\Authenticate::class,
            'guest'     => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'verified'  => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'throttle'  => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'can'       => \Illuminate\Auth\Middleware\Authorize::class,
        ]);

        // -------------------------------------------------------
        // Web Middleware Group (runs on all web routes)
        // -------------------------------------------------------
        $middleware->web(append: [
            // \App\Http\Middleware\MyCustomMiddleware::class,
        ]);

        // -------------------------------------------------------
        // API Middleware Group
        // -------------------------------------------------------
        $middleware->api(append: [
            // \App\Http\Middleware\MyApiMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();