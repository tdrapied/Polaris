<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Renvoie toutes la liste des postes
     */
    public function list() {
        $posts = DB::table('posts')
                        ->select('posts.*', 'users.username')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->orderBy('posts.created_at', 'desc')
                        // ->orderBy('id', 'asc')
                        ->get();

        return view('admin/post/list', [
            'posts' => $posts
        ]);
    }

    public function delete($id = null)
    {
        (new PostController)->delete($id);
        return redirect()->route('admin_post_list');
    }

    public function edit(Request $request, $id = null)
    {
        $view = (new PostController)->form($request, $id);

        if ($view instanceof \Illuminate\View\View) {
            return $view;
        }

        return redirect()->route('admin_post_list');
    }

    /**
     * Publie le post
     */
    public function enable($id = null) {
        $post = Post::find($id);

        // Si le post n'existe pas
        if (!$post) return abort(404);

        if ($post && !$post->is_published) {
            $post->where('id', $id)
                  ->update(['is_published'=> true]);
        }

        return redirect()->route('admin_post_list');
    }

    /**
     * Dépublie le post
     */
    public function disable($id = null) {
        $post = Post::find($id);

        // Si le post n'existe pas
        if (!$post) return abort(404);

        if ($post && $post->is_published) {
            $post->where('id', $id)
                  ->update(['is_published'=> false]);
        }

        return redirect()->route('admin_post_list');
    }

}
