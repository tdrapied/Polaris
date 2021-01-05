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

        return view('post/validation', [
            'posts' => $posts
        ]);
    }
    public function activate($id = null){
        $post = Post::find($id);
        if($post &&  $post->is_published == false){
               $post->where('id', $id)
                    ->update(['is_published'=> true]);
            }
        return redirect()->route('validation');
    }
   
   public function deactivate($id = null){
        $post = Post::find($id);
        if($post &&  $post->is_published == true){
            $post->where('id', $id)
                 ->update(['is_published'=> false]);
        }
    return redirect()->route('validation');
    }
}
