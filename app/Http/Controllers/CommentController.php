<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request ){
        $this->validate($request,[
            'name'=>'required|max:25',
            'email'=>'required|email',
            'comments'=>'required|max:250'
        ]);
        $post = Post::findOrFail($request->query('comments'));

        $array=collect($request->only(['name', 'email', 'comments' ]))->put('approved',true)->put('posts_id',$post->id)->all();

        $comment = Comment::create($array);
        $comments = Comment::all();


        return  redirect()->route('homepage')->with('info', 'comments created succesfully')->with([
            'comments' => $comments
        ]);
    }
}
