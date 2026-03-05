<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
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
            'guest'     => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
            'verified'  => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'throttle'  => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'can'       => \Illuminate\Auth\Middleware\Authorize::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
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
   

    })
 
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
    
