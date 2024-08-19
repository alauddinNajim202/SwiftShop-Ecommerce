<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_admin_login(Request $request){
        // dd($request->all());

        $remember = !empty($request->remember) ? true : false;
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password, 'is_admin' => 1], $remember)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }

    }

    public function auth_admin_logout(){
        // dd($request->all());

        Auth::logout();
        return redirect()->route('admin.auth.login');

    }
}
