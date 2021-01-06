<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

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

    /**
     * Renvoie un post random
     */
    public function random() {
        $random = DB::table('posts')
                        ->where('is_published', true)
                        ->inRandomOrder()
                        ->first();

        return view('post/random', [
            'post' => $random
        ]);
    }

    public function search(Request $request)
    {
        $title = $request->get('title');
        $user_id = $request->get('user_id');
       
        $user = DB::table('users')->get('id');
        dd($user);
        $posts = DB::table('posts')
                        ->where('title', 'like', "%$title%")
                        //->where('user_id', 'like', "%$user->id%")
                        ->where('is_published', true)
                        ->orderBy('created_at', 'desc')
                        ->get();
                        dd($user, $title, $posts,);
        return view('post/search', [
            'posts' => $posts
        ]);
    }

    public function delete(Request $request, $id = null) {
        // On récupére le post par rapport à l'id passé en paramètre
        $post = Post::find($id);

        // Si le post existe, on le supprime
        if ($post) $post->delete();

        return redirect()->route('home');
    }

    public function form(Request $request, $id = null) {
        // Créer un post par défault
        if (!$id && $id != '0') $post = new Post($request->all());
        // Ou récupére celui déjà existant
        else {
            $post = Post::find($id);
            // Si le post n'existe pas
            if (!$post) return response(null, 400);
        }

        $method = $request->method();
        $error = false;

        if ($request->isMethod('post')) {
            // On valide le formulaire
            $validator = \Validator::make($request->all(), Post::$rules);

            $error = $validator->fails();
            if (!$error) {

                // Modifie le post avec les nouvelles données soumis par le formulaire
                $post->update($request->all());

                // Si le post n'as pas encore d'ID
                if (!$post->id) {
                    // On lui rajoute l'id de son créateur
                    $post->user_id = $_SESSION['user']->id;
                }

                // Si l'enregistrement ne fonctionne pas
                if (!$post->save()) {
                    return response(null, 500);
                }

                return redirect()->route('home');

            }

        }

        return view('post/form', [
            'post' => $post,
            'edit' => $post->exists, // si s'est une édition
            'error' => $error
        ]);
    }
}
