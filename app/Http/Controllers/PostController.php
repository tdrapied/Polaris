<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    /**
     * Renvoie la liste des postes
     */
    public function list() {
        return view('post/list');
    }
}
