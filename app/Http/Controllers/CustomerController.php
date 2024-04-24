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

    public function showSingle($id)
    {
        return view('/dashboard/customer/cust', [
            "title" => "Detail Customer",
            "customer" => Customer::find($id)
           
        ]);
    }
}
