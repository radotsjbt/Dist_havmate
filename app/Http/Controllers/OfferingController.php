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
    // Farmer page
    public function sendOffer($id)
    { 
        // create new offering
        $off = new Offering();
        
        // save the user id (farmer) to the variable
        $farm = auth()->user()->id;

        // find distributor data based on the id from the route
        $dist = Distributor::find($id);

        // find the farmer's product based on the id
        $harv= Harvest::find($farm);
        

        $off->Offer_ID = IdGenerator::generate([
         'table' => 'offering',
         'field' => 'Offer_ID',
         'length' => 7,
         'prefix' => 'OFR'
     ]);
        $off->Dist_Id = $id;
        $off->Dist_Name= $dist->Dist_Name;
        $off->Farmer_Id = $farm;
        $off->Farmer_Name = auth()->user()->username;
        $off->Harv_Id = $harv->id;
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

     return redirect('/dashboard/offering/fromFarmer/index');

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
 
    public function showToFarmer(){
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

    // Distributor page
    public function showToDistributor(){
        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',  
            'offering' => Offering::all(),
        ]);
    }

    public function acceptOffering($id){
      

        // update into offering table
        DB::update('update offering set status=? where id=?', ["Accept", $id]);

        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',  
            'offering' => Offering::all(),
        ]);
    }
}
