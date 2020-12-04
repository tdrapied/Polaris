<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login() {
        return view('security/login', [
            'error' => true
        ]);
    }


    public function signup() {
        return view('security/signup', [
            'error' => true
        ]);
    }
}
