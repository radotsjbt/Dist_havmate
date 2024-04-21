<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    

    public function index(){

        return view('/dashboard/customer/index', [
            "title" => "Distributor",
            "us" => User::all()
        ]);
        
    }

    public function show($id, $Company_Name){
        return view('cust', [
            "title" => Customer::find($Company_Name),
            "post" => Customer::find($id)
        ]);
    }
}
