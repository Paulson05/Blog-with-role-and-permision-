<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function homepage()
    {



        $posts = Post::all();
        return view('frontend.homepage',[
            'posts' => $posts
        ]);
    }

    public function getSinglePost(Post $post){

        return view('frontend.singlepage')->with([
            'post' => $post,
        ]);
    }
}
