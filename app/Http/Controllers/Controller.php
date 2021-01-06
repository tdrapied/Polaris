<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Retourne un boolean si l'utilisateur n'as pas les droits sur le post
     *
     * PS : La demande doit être appelé uniquement si l'utilisateur est connecté
     */
    public function checkPostPerms($post) {

        $user = $_SESSION['user'];

        // Si l'utilisateur n'as aucun rôle
        if (!$user->role) {
            // On vérifie que c'est son propre post, sinon :
            if ($post->user_id != $user->id) return false;
        }

        return true;

    }
}
