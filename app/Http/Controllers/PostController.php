<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Renvoie la liste des postes
     */
    public function list() {
        $posts = DB::table('posts')
                        ->where('is_published', true)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('post/list', [
            'posts' => $posts
        ]);
    }

    public function new(Request $request) {

        $method = $request->method();

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'title' => 'required',
            ]);

            //dd($this);*/

            // $title = $request->input('title');
        }

        return view('post/new');
    }
}
