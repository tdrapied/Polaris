<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Models\User;
use App\Traits\SessionTrait;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
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
