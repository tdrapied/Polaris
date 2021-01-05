<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function listAll() {
        $posts = DB::table('posts')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('crud/user/admin', [
            'posts' => $posts
        ]);
    }
    public function activate($id = null){
        $posts = Post::find($id);
        if($posts &&  $posts->is_published == false){
               $posts->where('id', $id)
                    ->update(['is_published'=> true]);
            }
            return redirect('crud/user/admin');
    }
   
   public function deactivate($id = null){
        $posts = Post::find($id);
        if($posts &&  $posts->is_published == true){
            $posts->where('id', $id)
                 ->update(['is_published'=> false]);
        }
       return redirect('crud/user/admin');
    }

    public function deleteAdmin(Request $request, $id = null) {
        // On récupére le post par rapport à l'id passé en paramètre
        $post = Post::find($id);

        // Si le post existe, on le supprime
        if ($post) $post->delete();

        return redirect('crud/user/admin');
    }

}
