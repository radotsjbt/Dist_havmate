<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserController extends Controller
{
    public function store(Request $request){
    
        $farmer = new User();

        $farmer->Farmer_ID = IdGenerator::generate([
            'table' => 'users',
            'field' => 'Farmer_ID',
            'length' => 7,
            'prefix' => 'FMR'
        ]);
        $farmer->username = request('username');
        $farmer->email = request('email');
        $farmer->password = request('password');
        $farmer->role = request('role');
        $farmer->save();

        return redirect('/login');
    }

    public function show(){
        return view('dashboard.profile.index', [ 
            'title' => 'User Profile',  
            'profile' => User::all()     
            ]);
    }
}
