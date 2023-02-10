<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function handleRegister(Request $request){
        $request->validate([
           'name'=>'required|max:50',
            'email'=>'required|unique:users|email',
            'password'=>'required|max:50'
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect(route('user.index'));
    }

    public function login(){
        return view('auth.login');
    }

    public function handleLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $is_login=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if (! $is_login){
            return redirect(route('auth.login'));
        }
        if (Auth::user()->is_admin==0){
            return redirect(route('user.index'));
        }
        if (Auth::user()->is_admin==1){
            return redirect(route('admin.home'));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('auth.login'));
    }
}
