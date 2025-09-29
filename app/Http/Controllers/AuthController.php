<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // signup (GET)
    public function showsignupform(){

        return view("auth.signup" , ['pagetitle' => 'signup']);

    }




    // signup (POST)
    public function signup(SignupRequest $request){

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // şifreyi hashle
        $user->save();

        Auth::login($user); // yeni kullanıcıyı giriş yap

        return redirect('/');
    }



    // login (GET)
    public function showloginform(){
        return view("auth.login" , ['pagetitle' => 'login']);
    }




    // login (POST)
    public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // Giriş başarılı
            $request->session()->regenerate();
            return redirect('/');
        }

         // Giriş başarısız
        return back()->withErrors([
            'email' => 'Email veya şifre hatalı.',
        ])->withInput(request()->all());


    }





    // logout (POST)
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
