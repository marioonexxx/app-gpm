<?php

use App\Http\Middleware\Administrator;
use App\Http\Middleware\Keuangan;
use App\Http\Middleware\Litbang;
use App\Http\Middleware\Sekretaris;
use App\Http\Middleware\Seksi;
use App\Http\Middleware\Subseksi;
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
        $middleware->alias([
            'Administrator' => Administrator::class,
            'Subseksi' => Subseksi::class,
            'Seksi' => Seksi::class,
            'Keuangan' => Keuangan::class,
            'Sekretaris' => Sekretaris::class,
            'Litbang' => Litbang::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
