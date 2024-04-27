<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
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
        $cust = new Customer();

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
                
                //Insert the data to the farmer's table
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
                'prefix' => 'CST'
                ]);
                
                //Insert the data to the customer's table
                $cust->Cust_ID = $user->User_ID ;
                $cust->Cust_Name = $user->username;
                $cust->Cust_Email = $user->email ;
                $cust->Cust_Phone = $user->phone;
                $cust->Cust_Address = $user->address;
             
                $cust->save(); //insert to customers table
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
