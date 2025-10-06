<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Permissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permissaoNecessaria): Response
    {
        $permissaoUsuario = session('usuario.permissao');

        $hierarquia = [
            'Admin' => 3,
            'Normal' => 2,
            'Leitura' => 1,
        ];

        // Se a permissão do usuário for maior ou igual à exigida
        if ($hierarquia[$permissaoUsuario] >= $hierarquia[$permissaoNecessaria]) {
            return $next($request);
        }

        abort(403, 'Permissão insuficiente');
    }
}
