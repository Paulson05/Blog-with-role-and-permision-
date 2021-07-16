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

//        dd($request->all());
     $this->validate($request, [
         'name' => 'required',
         'email' => 'required',
         'password' => 'required',
     ]);

    $data = collect($request->only(['email', 'name']))->put('password',bcrypt($request->password))->all();
    AdminUser::create($data);
    return redirect()->back()->with('success', 'successfully register');
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
