<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OfferingNotification;
use App\Models\Harvest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Offering;
use App\Models\Distributor;
use App\Models\User;

class OfferingController extends Controller
{
    public function sendOffer($id)
    { 
        $off = new Offering();
        $dist = Distributor::find($id)->Dist_Name;

        $off->Offer_ID = IdGenerator::generate([
         'table' => 'offering',
         'field' => 'Offer_ID',
         'length' => 7,
         'prefix' => 'OFR'
     ]);
        $off->Dist_Name= $dist;
        $off->Farmer_Id = auth()->user()->id;
        $off->Farmer_Name = auth()->user()->username;
        $off->Harv_Name = request('inputHarvName');
        $off->Qty= request('inputHarvQty');
        $off->Offer_Price= request('inputTotalPrice');
        $off->Notes= request('inputNotes');

        $off->save(); 

    //  $data =[
    //     'farmer' => $off['Farmer_Name'],
    //     'products' => $off['Harv_Name'],
    //     'quantity' => $off['Qty'],
    //     'price' => $off['Total_Price'],
    //  ];

    //  event(new OfferingNotification($data));

     return redirect('/dashboard/offering/index');

    }

    public function showForm($id)
    {
        return view('dashboard/offering/offer', [ 
            'title' => 'Send Offering',  
            'product' => Harvest::all(),
            'user' => User::all(),
            'dist' => Distributor::find($id)     
            ]);
    }
 
    public function show(){
        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',  
            'offering' => Offering::all(),
        ]);
    }
}
