<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Traits\SessionTrait;

class Authenticate
{
    /**
     * Vérifie que l'utilisateur est connecté
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Si la variable "user" existe dans la session
        if (isset($_SESSION['user'])) return $next($request);

        // sinon on redirige vers la connection
        return redirect()->route('security_login');
    }
}
