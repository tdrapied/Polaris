<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function login() {
        return view('security/login', [
            'error' => false
        ]);
    }

    public function signup(Request $request, $id = null) {

        // Créer un post par défault
        if (!$id && $id != '0') $user = new User($request->all());
        // Ou récupére celui déjà existant
        else {
            $user = User::find($id);
            // Si le post n'existe pas
            if (!$user) return response(null, 400);
        }

        $method = $request->method();
        $error = false;

        if ($request->isMethod('post')) {
            // On valide le formulaire
            $validator = \Validator::make($request->all(), User::$rules);

            $error = $validator->fails();
            if (!$error) {

                // Modifie le post avec les nouvelles données soumis par le formulaire
                $user->update($request->all());

                $user->password = Hash::make($user->password);
                // Si l'enregistrement ne fonctionne pas
                if (!$user->save()) {
                    return response(null, 500);
                }

                return redirect()->route('security_login');

            }

        }

        return view('security/signup', [
            'user' => $user,
            'edit' => $user->exists, // si s'est une édition
            'error' => $error
        ]);
    }
}
