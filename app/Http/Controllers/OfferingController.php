<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OfferingNotification;
use App\Models\Harvest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Offering;
use App\Models\Distributor;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $off->status= 'Waiting';

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
    public function delete($id)
    {
        // Alert::warning('Warning Title', 'Do you want to delete this product?');    
        DB::table('offering')->where('id', '=', $id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        return view('/dashboard/offering/editOff', [
            'title' => 'Edit Offering data',
            'off' => Offering::find($id),
            'product' => Harvest::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $off = Offering::find($id);

        $Dist_Name = $off->Dist_Name; 
        $Harv_Name = $request->input('inputHarvName'); 
        $Qty = $request->input('inputHarvQty'); 
        $Offer_Price = $request->input('inputTotalPrice'); 
        $Notes = $request->input('inputNotes'); 
        
        // update the data on database
        DB::update('update offering set Dist_Name=?, Harv_Name = ?,  Qty=?, Offer_Price=?, Notes=? where id=?', [$Dist_Name, $Harv_Name, $Qty, $Offer_Price, $Notes, $id]);

        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',
            'offering' => Offering::all()
        ]);
    }
}
