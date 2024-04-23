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
            "customer" => Customer::all()
        ]);
        
    }

    public function show($id){
        return view('/dashboard/customer/cust/{id}', [
            "cust" => Customer::find($id)
        ]);
    }
}
