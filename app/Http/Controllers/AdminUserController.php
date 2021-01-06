<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Renvoie toutes la liste des utilisateurs
     */
    public function list() {
        $users = DB::table('users')
                        ->orderBy('id', 'asc')
                        ->get();

        return view('admin/user/list', [
            'users' => $users
        ]);
    }

    public function edit(Request $request, $id) {
        $user = User::find($id);

        // Si le user n'existe pas
        if (!$user) return abort(404);

        $method = $request->method();
        $error = false;

        if ($request->isMethod('post')) {
            // On valide le formulaire
            $validator = \Validator::make($request->all(), [
                "username" => "required|min:3|max:12",
                "password" => "required|min:4|max:18"
            ]);

            $error = $validator->fails();

            if (!$error) {

                // Vérifie que le nom d'utilisateur n'existe pas déjà pour un autre
                $otherUser = User::getOneUserByUsername($request->username);

                if (!$otherUser || ($otherUser && $otherUser->id == $user->id)) {

                    // Modifie le post avec les nouvelles données soumis par le formulaire
                    $user->username = $request->input('username');
                    $user->password = $request->input('password');

                    $role = $request->input('role');
                    $user->role = $role == "" ? null : $role;

                    $user->password = Hash::make($request->password);

                    if (!$user->save()) {
                        return abort(500);
                    }

                    return redirect()->route('admin_user_list');

                }
                else $error = true;

            }

        }

        return view('admin/user/edit', [
            'user' => $user,
            'error' => $error
        ]);
    }
}
