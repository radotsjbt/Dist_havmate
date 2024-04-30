<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Distributor;
use App\Models\Farmer;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserController extends Controller
{
    // store the data  of users that regist through the form
    public function store(){
    
        // create the new user
        $user = new User(); 

        // create new farmer
        $farm = new Farmer();

        // create new customer
        $dist = new Distributor();

        $user->username = request('username');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->email = request('email');
        $user->password = request('password');
        $user->role = request('role');

        //Condition based on the user's role when they're create account
            if($user->role === 'Farmer'){
                $user->User_ID = IdGenerator::generate([
                'table' => 'users',
                'length' => 7,
                'field' => 'User_ID',
                'prefix' => 'FMR'
                ]);
                
                //And also insert the data to the farmer's table
                $farm->Farmer_ID = $user->User_ID;
                $farm->Farmer_Name = $user->username;
                $farm->Farmer_Email = $user->email;
                $farm->Farmer_Phone = $user->phone ;
                $farm->Farmer_Address = $user->address;

                $farm->save(); //insert to farmers table
            }
            if($user->role === 'Distributor'){
                $user->User_ID = IdGenerator::generate([
                'table' => 'users',
                'length' => 7,
                'field' => 'User_ID',
                'prefix' => 'DSB'
                ]);
                
                //And also insert the data to the distributor's table 
                $dist->Dist_ID = $user->User_ID ;
                $dist->Dist_Name = $user->username;
                $dist->Dist_Email = $user->email ;
                $dist->Dist_Phone = $user->phone;
                $dist->Dist_Address = $user->address;
             
                $dist->save(); //insert to customers table
            }
        $user->save(); //insert to users table
        return redirect('/login');
    }

    // show the profile of the user
    public function show($id){
        return view('dashboard.profile.index', [ 
            'title' => 'User Profile',  
            'profile' => User::find($id)     
            ]);
    }

}
