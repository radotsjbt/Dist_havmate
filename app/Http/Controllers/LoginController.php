<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);
        // $User_ID = auth()->user()->User_ID;

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate(); //session regenerate is to prevent session fixation attacks
            
            // $data = User::select('*')
            // ->where('User_ID', $User_ID)
            // ->get();


            return redirect()->intended('/dashboard');
        }
        
        return back()->with('loginError', 'Invalid Username or Password !');
        
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/');
    }
}
