<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch(){
        $posts = Post::all();
        return response([
            'posts'=>$posts
        ]);
    }

    public function index()
    {
        return view('backend.admin.pages.post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

//       dd($request->all());
//        $this->validate($request,[
//            'title' => 'required',
//            'body'=>  'required',
//             'slug' => 'required',
//            'image' => 'required',
//            'category_id' => 'required',
//
//        ]);
        $validator = Validator::make($request->all(),[

            'title' => 'required',
            'body'=>  'required',
            'slug' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            if ( $request->hasfile('image')){
                $file  =$request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename =    time() . '.' .$extension;
                $file->move('upload/images', $filename);

            }
            else {
                $filename='';
            }


            $post = Post::create(collect($request->only(['title','body','slug','category_id']))->put('image',$filename)->all());
            $post->tags()->sync($request->name);
            $post->save();
            return response()->json([
                'status' => 200,
                'message' => 'post added successfully',

            ]);
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
//        dd($request->all());



        $this->validate($request,[
            'title' => 'required',
            'body'=>  'required',
            'slug' => 'required',
            'image' => 'required',
            'category_id' => 'required',

        ]);


        if ( $request->hasfile('image')){
            $file  =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =    time() . '.' .$extension;
            $file->move('upload/images', $filename);

        }
        else {
            $filename='';
        }
        $post = update(collect($request->only(['title','body','slug','category_id']))->put('image',$filename)->all());
//        $post->update($request->only(['title','body','slug','category_id']));
        $post->tags()->sync($request->name);
        $post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return  redirect()->back();
    }
}
