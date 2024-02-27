<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdicionaHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $condicao = 'nao-ignorar'): Response
    {
        $response = $next($request);

        if ($condicao === 'ignorar') {
            return $response;
        }
        
        // $response->setContent($response->getContent() . ' Adicionado na middleware');
        $response->headers->add([
            'X-Treinaweb' => 'Adicionado no middleware'
        ]);

        return $response;
    }
}
