<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\SessionTrait;

use ParagonIE\Cookie\Cookie;

class SecurityController extends Controller
{
    public function login(Request $request) {

        $method = $request->method();
        $error = false;

        if ($request->isMethod('post')) {

            // On récupère l'utilisateur avec son "username"
            $user = User::getOneUserByUsername($request->get('username'));

            if  ($user && Hash::check($request->get('password'), $user->password) ) {

                SessionTrait::setSessionCookie($user->username);

                return redirect()->route('home');

            }
            else $error = true;

        }

        return view('security/login', [
            'error' => $error
        ]);
    }

    public function logout()
    {
        SessionTrait::unsetSessionCookie();
        return redirect()->route('home');
    }

    public function signup(Request $request) {

        $method = $request->method();
        $error = false;

        if ($request->isMethod('post')) {
            // On valide le formulaire
            $validator = \Validator::make($request->all(), User::$rules);

            $error = $validator->fails();
            if (!$error) {

                $user = new User($request->all());

                $user->password = Hash::make($user->password);
                // Si l'enregistrement ne fonctionne pas
                if (!$user->save()) {
                    return response(null, 500);
                }

                return redirect()->route('security_login');

            }

        }

        return view('security/signup', [
            'error' => $error
        ]);
    }
}
