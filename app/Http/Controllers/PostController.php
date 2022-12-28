<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
       return response()->json($posts);
    }
    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        return response()->json([
            'message' => 'New post created'
        ]);
    }
    public function deletePost($id)
    {
        $post=Post::find($id);
        $post->delete();
        return response()->json(['message'=>'post id deleted']);
    }
}
