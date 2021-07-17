<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

   public function getRegister(){
        return view('frontend.auth.register');
   }

   public function PostRegister(Request $request){



        $this->validate($request,[
           'name'=> 'required',
           'email'=> 'required',
           'password' => 'required',
           'image' => 'required',
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
       $post = User::create(collect($request->only(['name','email']))->put('image',$filename)->put('password',bcrypt($request->password))->all());

       $post->save();
         return redirect()->route('user.getlogin');

   }
    public function getLogin(){
        return view('frontend.auth.login');
    }
    public function postLogin(Request $request){
//       dd($request->all());
         if(!Auth::attempt($request->only(['email', 'password'])))
         {
             return redirect()->back();

         }
         else{
             return redirect()->route('homepage');
         }
    }
}
