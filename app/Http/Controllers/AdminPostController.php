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
                        ->orderBy('created_at', 'desc')
                        // ->orderBy('id', 'asc')
                        ->get();

        return view('admin/post/list', [
            'posts' => $posts
        ]);
    }

    /**
     * Publie le post
     */
    public function enable($id = null) {
        $posts = Post::find($id);

        if ($posts &&  $posts->is_published == false) {
            $posts->where('id', $id)
                  ->update(['is_published'=> true]);
        }

        return redirect()->route('admin_post_list');
    }

    /**
     * Dépublie le post
     */
    public function disable($id = null){
        $posts = Post::find($id);

        if ($posts && $posts->is_published == true) {
            $posts->where('id', $id)
                  ->update(['is_published'=> false]);
        }

        return redirect()->route('admin_post_list');
    }

}
