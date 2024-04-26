<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        return view('dashboard.index', [ 
            'title' => 'Dashboard',  
               'customer' => User::all()
            ]);
    }

   
}
