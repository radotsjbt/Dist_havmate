<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OfferingNotification;
use App\Models\Harvest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Offering;
use App\Models\User;

class OfferingController extends Controller
{
    public function sendOffer()
    { 
        $off = new Offering();

        $off->Offer_ID = IdGenerator::generate([
         'table' => 'offering',
         'field' => 'Offer_ID',
         'length' => 7,
         'prefix' => 'OFR'
     ]);
     $off->Cust_Name= request('inputCustName');
     $off->Farmer_Id = auth()->user()->id;
     $off->Farmer_Name = auth()->user()->username;
     $off->Harv_Name = request('inputHarvName');
     $off->Qty= request('inputQty');
     $off->Total_Price= request('inputTotalPrice');
     $off->Notes= request('inputNotes');

     $off->save(); 

     $data =[
        'farmer' => $off['Farmer_Name'],
        'products' => $off['Harv_Name'],
        'quantity' => $off['Qty'],
        'price' => $off['Total_Price'],
     ];

     event(new OfferingNotification($data));

     return redirect('/dashboard/offering/index');

    }

    public function show()
    {
        return view('dashboard.offering.index', [ 
            'title' => 'Offering',  
            'offer' => Offering::all()     
            ]);
    }
 
}
