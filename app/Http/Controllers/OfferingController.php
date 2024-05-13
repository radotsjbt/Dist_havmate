<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Auth;
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

    public function getNotificationCount(){
        $notificationCount = Offering::where('Dist_Id','=',Auth::user()->id)->get()->count(); // Replace with your actual logic to get the count
        // dd($notificationCount);
        return response()->json(['count' => $notificationCount]);
    }
    public function sendOffer($id)
    { 
        $off = new Offering();
        $farm = auth()->user()->id;
        // dd($farm);
        $dist = Distributor::find($id);
        
        

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
        
        $harv= Harvest::where('Harv_Name','=',request('inputHarvName'))->first();
        
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
        // dd(Offering::all());
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

    public function accept($id)
    {
        $offering = Offering::find($id);

        $ord = new Order();
        
        $dist = auth()->user()->id;
        $harv = Harvest::find($offering->Harv_Id);
        
        // dd($offering);

        $ord->Order_ID = IdGenerator::generate([
         'table' => 'orders',
         'field' => 'Order_ID',
         'length' => 7,
         'prefix' => 'ORD'
     ]);
        $ord->Dist_Id = auth()->user()->id;
        $ord->Dist_Name= auth()->user()->username;
        $ord->Farmer_Id = $harv->Farmer_Id;
        $ord->Farmer_Name = $harv->Farmer_Name;
        $ord->Harv_Id = $id;
        $ord->Harv_Name = $harv->Harv_Name;
        $ord->Qty= $offering->Qty;
        $ord->Total_Price= $offering->Offer_Price;
        $ord->Notes= 'base on order';
        $ord->status= 'Waiting';

        $ord->save();

        $offering->status ="Accept";
        $offering->update();


        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',  
            'offering' => Offering::all(),
        ]);
    }


    public function decline($id)
    {
        $offering = Offering::find($id);
        $offering->status ="Decline";
        $offering->update();

        return view('/dashboard/offering/index', [
            'title' => 'Offering Status',  
            'offering' => Offering::all(),
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
