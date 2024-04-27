<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);
       

        if (Auth::attempt($credentials)) {

            //alert if the user succes to login
            Alert::success('Login Successfully');

            $request->session()->regenerate(); //session regenerate is to prevent session fixation attacks

            // the user will go to the dashboard
            return redirect()->intended('/dashboard');
        }
        //if the user failed to login
        return back()->with('loginError','Invalid Username and Password!');
        
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/');
    }

    
}
