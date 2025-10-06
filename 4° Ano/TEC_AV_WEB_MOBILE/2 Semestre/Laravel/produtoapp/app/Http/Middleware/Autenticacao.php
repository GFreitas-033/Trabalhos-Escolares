<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autenticacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('usuario.logado')){ //Usuário Autenticado
            return $next($request);
        }else{ //Usuário ainda NÃO Autenticado
            //Redireciona para a página anterior (Login)
            return redirect()
                    ->route('login')
                    ->with('erro', 'Por favor, Identifique-se!');
        }
    }
}
