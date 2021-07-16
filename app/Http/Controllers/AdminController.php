<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

    public function postLogin(Request  $request){

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){

            return redirect()->back()->with('info', 'could not sign you in with those details');

        }

        return redirect()->route('home')
            ->with('info', 'you are successfully signed in!');

    }
}
