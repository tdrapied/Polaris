<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Traits\SessionTrait;

class Connection
{
    /**
     * Permet de vérifier si l'utilisateur est connecté et que ces données n'ont pas étaient modifiées
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifie que le l'utilisateur est connecté
        $encryptedUsername = $request->cookie(COOKIE_SESSION_KEY);

        if (!$encryptedUsername) return $next($request);

        $username = SessionTrait::getSessionCookieValue($encryptedUsername);

        if (!empty($username)) {

            $user = User::getOneUserByUsername($username);

            if ($user) $_SESSION['user'] = $user;
            else SessionTrait::unsetSessionCookie();

        }

        return $next($request);
    }
}
