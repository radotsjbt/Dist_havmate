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
use Illuminate\View\View;

class OfferingController extends Controller
{
<<<<<<< HEAD

    public function getNotificationCount(){
        $notificationCount = Offering::where('Dist_Id','=',Auth::user()->id)->get()->count(); // Replace with your actual logic to get the count
        // dd($notificationCount);
        return response()->json(['count' => $notificationCount]);
    }
=======
    // when farmer send the offering to the distributor
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d
    public function sendOffer($id)
    { 
        // create new offering
        $off = new Offering();
<<<<<<< HEAD
        $farm = auth()->user()->id;
        // dd($farm);
        $dist = Distributor::find($id);
        
        
=======
        
        // save the user id (farmer) in a variable
        $farm = auth()->user()->id;

        // find distributor data based on the id from the route
        $dist = Distributor::find($id);
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d

        // find the farmer's product based on the harvest name
        $harv= Harvest::where('Harv_Name','=',request('inputHarvName'))->first();

        // generate Offer_ID
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
<<<<<<< HEAD
        
        $harv= Harvest::where('Harv_Name','=',request('inputHarvName'))->first();
        
        $off->Harv_Id = $harv->id;
=======
        $off->Harv_Id = $harv->id; 
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d
        $off->Harv_Name = request('inputHarvName');
        $off->Qty= request('inputHarvQty');
        $off->Offer_Price= request('inputTotalPrice');
        $off->Notes= request('inputNotes');
        $off->status= 'Waiting';

        $off->save(); 

        // decrease the stock
        // collect the qty of product
        $qty = $off->Qty; 
        // collect the current stock of product
        $harvStock = $harv->Harv_Stock;
        // product id
        $hrv_id = $harv->id;

        $current = $harvStock - $qty;

        // update the data on database
        DB::update('update harvests set Harv_Stock=? where id=?', [$current, $hrv_id]);

     return redirect('/dashboard/offering/fromFarmer/index');

    }

    // show offering form 
    public function showForm($id)
    {
        $prod = DB::table('harvests')->where('Harv_Stock', '>', 0)->get();

        return view('dashboard/offering/offer', [ 
            'title' => 'Send Offering',  
            'product' => $prod,
            'user' => User::all(),
            'dist' => Distributor::find($id)     
            ]);
    }
 
<<<<<<< HEAD
    public function show(){
        // dd(Offering::all());
=======
    // show all the offering to the farmer
    public function showToFarmer() : View
    {
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d
        return view('/dashboard/offering/index', [
        'title' => 'Offering Status',  
        'offering' => Offering::paginate(10),
        ]);
    }

    // delete offering's data
    public function delete($id)
    { 
        DB::table('offering')->where('id', '=', $id)->delete();

        return redirect()->back();
    }

    // show the form to edit offering's data
    public function edit($id)
    {
        return view('/dashboard/offering/editOff', [
            'title' => 'Edit Offering data',
            'off' => Offering::find($id),
            'product' => Harvest::all(),
        ]);
    }

<<<<<<< HEAD
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
=======
    // update the offering's data 
    public function update(Request $request, $id): View
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d
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
            'offering' => Offering::paginate(10)
        ]);
    }

    // show the incoming offers in distributor page
    public function showToDistributor(): View
    {
        return view('/dashboard/offering/index', [
            'title' => 'Incoming Offers',  
            'offering' => Offering::paginate(10),
        ]);
    }

    //  when the distributor acceptthe offering
    public function acceptOffering($id): View
    {
        // update into offering table
        DB::update('update offering set status=? where id=?', ["Accepted", $id]);

        return view('/dashboard/offering/index', [
            'title' => 'Incoming Offers',  
            'offering' => Offering::paginate(10),
        ]);
    }

    // when the distributor decline the offering
    public function declineOffering($id): View
    {
        // update into offering table
        DB::update('update offering set status=? where id=?', ["Declined", $id]);

        // restore the stock
        // find the offering's id
        $offering = Offering::find($id);
        // collect the qty of product from the offering's data
        $harv = $offering->Qty;
        // collect the product id from the offering's data                                                  
        $hrvId = $offering->Harv_Id;
        // find the product based on the id's on the harvests table
        $checkHrv = Harvest::find($hrvId);
        // latest stock 
        $stock = $checkHrv->Harv_Stock;

        // restore the products
        $restore = $harv + $stock;

        // update stock in the database
        DB::update('update harvests set Harv_Stock=? where id=?' , [$restore, $hrvId]);

        return view('/dashboard/offering/index', [
            'title' => 'Incoming Offers',  
            'offering' => Offering::paginate(10),
        ]);
    }
}
