<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->query()->get();
        return view('crud/user/index', ['users' => $users]);
    }

    public function edit(Request $request, $id = null) {
        // Créer un user par défault
        if (!$id && $id != '0') $user = new User($request->all());
        // Ou récupére celui déjà existant
        else {
            $user = User::find($id);
            // Si le user n'existe pas
            if (!$user) return response(null, 400);
        }

        $method = $request->method();
        $error = false;

        if ($request->isMethod('user')) {
            // On valide le formulaire
            $validator = \Validator::make($request->all(), User::$rules);

            $error = $validator->fails();
            if (!$error) {

                // Modifie le post avec les nouvelles données soumis par le formulaire
                $user->update($request->all());

                // Si l'enregistrement ne fonctionne pas
                if (!$user->save()) {
                    return response(null, 500);
                }

                return redirect()->route('user_index');

            }

        }

        return view('crud/user/edit', [
            'user' => $user,
            'edit' => $user->exists, // si s'est une édition
            'error' => $error
        ]);
    }

    public function update(Request $request, $id) {
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->user->query()->find($id);
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->password = Hash::make($user->password);
        $user->save();
        return redirect()->route('user_index');
    }

    public function destroy($id) {
        $this->user->query()->findOrFail($id)->delete();
        return redirect()->route('user_index');
    }
}
