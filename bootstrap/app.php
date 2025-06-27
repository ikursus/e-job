<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {
            // Route untuk web.php
            Route::middleware('web')
            ->group(base_path('routes/web.php'));

            // Route untuk admin.php
            Route::middleware('web', 'auth')
            ->prefix('admin')
            ->name('admin.')
            ->group(base_path('routes/admin.php'));
        }

    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
