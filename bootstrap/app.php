<?php

use App\Http\Middleware\AdicionaHeadersMiddleware;
use App\Http\Middleware\TrataEmailMiddleware;
use App\Http\Middleware\VerificaTokenMiddleware;
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
        //$middleware->prepend(VerificaTokenMiddleware::class);
        $middleware->alias([
            'VerificaToken' => VerificaTokenMiddleware::class,
            'TrataEmail' => TrataEmailMiddleware::class,
            'AdicionaHeaders' => AdicionaHeadersMiddleware::class
        ]);

        $middleware->appendToGroup('autentica', [
            VerificaTokenMiddleware::class,
            TrataEmailMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
