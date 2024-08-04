<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check.jenis_pengajuan' => \App\Http\Middleware\CheckJenisPengajuan::class,
            'check.ticket' => \App\Http\Middleware\CheckNoTicket::class,
            'only.admin' => \App\Http\Middleware\OnlyAdminAccess::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    $app->register(\Barryvdh\DomPDF\ServiceProvider::class);
