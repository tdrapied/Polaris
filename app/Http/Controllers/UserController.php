<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->query()->get();
        return view('crud/user/index', ['users' => $users]);
    }

    public function edit($id) {
        $user = $this->user->query()->find($id);
        return view('crud/user/edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->user->query()->find($id);
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->save();
        return redirect()->route('user_index');
    }

    public function delete($id) {
        $user = $this->user->query()->findOrFail($id);
        return view('crud/user/delete', ['user' => $user]);
    }

    public function destroy($id) {
        $this->user->query()->findOrFail($id)->delete();
        return redirect()->route('user_index');
    }
}
