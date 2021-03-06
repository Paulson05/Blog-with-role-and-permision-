<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public  function dashboard(){
        return view('backend.admin.pages.dashboard');
    }
    public  function getLogin(){
        return view('backend.admin.auth.login');
    }

    public function getRegister(){
        return view('backend.admin.auth.register');


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
            $file->move('upload2/images', $filename);

        }
        else {
            $filename='';
        }
        $post = AdminUser::create(collect($request->only(['name','email']))->put('image',$filename)->put('password',bcrypt($request->password))->all());

        $post->save();
        return redirect()->route('admin.getlogin');

    }

    public function postLogin(Request $request){
        $cred = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($cred)){
            return redirect()->route('admin.home');
        }else{
            return  redirect()->route('admin.getlogin');
        }



    }
    public function logout(){
//        dd('ok');
        Auth::logout();
        return redirect()->route('homepage');

    }


}
