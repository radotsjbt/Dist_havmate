<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Harvest;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendOrder($id)
    {
        $ord = new Order();
        

        $harv = Harvest::find($id);
        

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
        $ord->Qty= request('inputQty');
        $ord->Price= $harv->Harv_Price;
        $ord->Total_Price= request('inputTotalPrice');
        $ord->Notes= request('inputNotes');
        $ord->status= 'Waiting';

        $ord->save(); 
     return redirect('/dashboard/ordering/fromDistributor/index');
    }

    public function showToFarmer() : View
    {
        return view('/dashboard/ordering/index', [
            'title' => 'Incoming Orders',  
            'ordering' => Order::paginate(10),
        ]);
    }

    public function showForm($id)
    {
        return view('dashboard/ordering/order', [ 
            'title' => 'Send Order',  
            'product' => Harvest::find($id),
            'user' => User::all(),   
            ]);
    }

    public function new_order()
    {
        return view('dashboard/ordering/new_order', [ 
            'title' => 'Send Order',  
            'products' => Harvest::all(),
            'user' => User::all(),   
            ]);
    }

    public function sendOrderNew(Request $request)
    {
        $ord = new Order();
        
        $dist = auth()->user()->id;
        $harv = Harvest::find($request->Harv_Id);
        // dd($harv);

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
        $ord->Harv_Id = $harv->id;
        $ord->Harv_Name = $harv->Harv_Name;
        $ord->Qty= request('inputQty');
        $ord->Total_Price= request('inputTotalPrice');
        $ord->Notes= request('inputNotes');
        $ord->status= 'Waiting';
        // dd($ord);

        $ord->save(); 
     return redirect('/dashboard/ordering/index');
    }

    public function deleteOrder($id)
    {   
        DB::table('orders')->where('id', '=', $id)->delete();

        return redirect()->back();
    }

    public function editOrder($id)
    {
        return view('/dashboard/ordering/editOrder', [
            'title' => 'Edit Order Data',
            'ord' => Order::find($id),
            'product' => Harvest::all(),
        ]);
    }
    public function updateOrder(Request $request, $id)
    {
        
        $ord = Order::find($id);

        $Dist_Name = $ord->Dist_Name; 
        $Harv_Name = $ord->Harv_Name; 
        $Qty = $request->input('inputHarvQty'); 
        $Total_Price = $request->input('inputTotalPrice'); 
        $Notes = $request->input('inputNotes'); 
        
        // update the data on database
        DB::update('update orders set Dist_Name=?, Harv_Name = ?,  Qty=?, Total_Price=?, Notes=? where id=?', [$Dist_Name, $Harv_Name, $Qty, $Total_Price, $Notes, $id]);

        return view('/dashboard/ordering/index', [
            'title' => 'Order Status',
            'ordering' => Order::all()
        ]);
    }

    public function showToDistributor() : View
    {
        return view('/dashboard/ordering/index', [
            'title' => 'Order Status',  
            'ordering' => Order::paginate(10),
        ]);
    }
}
