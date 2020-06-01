<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostController extends Controller
{
    //
    public function show($slug)
    {
        //Use below code without model
        $post = DB::table('posts')->where('slug', $slug)->first();
        //dd($post);

        //Now i am createing model for post.

       // $post = Post::where('slug', $slug)->first();   // I have created this code as inline


        if (! $post)
        {
            abort(404);
        }
        return view('posts', ['post' => Post::where('slug', $slug)->first() ]);
    }
    
}
