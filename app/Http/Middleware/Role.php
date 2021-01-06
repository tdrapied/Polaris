<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Traits\SessionTrait;

class Role
{
    /**
     * Vérifie si l'utilisateur est connecté et ces les rôles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $role = 'USER')
    {
        // Si la variable "user" existe dans la session
        // L'utilisateur est donc connecté
        if (isset($_SESSION['user'])) {

            $userRole = strtoupper($_SESSION['user']->role) ?: 'USER';

            switch ($userRole) {

                // L'administrateur peut aller partout de toutes façons :p
                case 'ADMIN':
                    return $next($request);

                case 'MODERATOR':
                    if ($role != 'ADMIN') return $next($request);

                // Role: Utilisateur par défault
                case 'USER':
                    if ($role == 'USER') return $next($request);

                // On redirige sur la page principal
                default:
                    return redirect()->route('home');
            }

        }

        // sinon on redirige vers la connection
        return redirect()->route('security_login');
    }
}
