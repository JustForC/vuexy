<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function doLogin(Request $request){
        $credentials=[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard()->attempt($credentials)){
            return redirect()->route('category.index');
        }

        return redirect()->back();
    }

    public function register(){
        return view('auth.register');
    }

    public function doRegister(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login');
    }

    public function doLogout(){
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
