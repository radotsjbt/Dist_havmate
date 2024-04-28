<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\User;
use App\Http\Requests\UpdateHarvestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

    

class HarvestController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $harv = new Harvest();

        $harv->Harv_ID = IdGenerator::generate([
         'table' => 'harvests',
         'field' => 'Harv_ID',
         'length' => 7,
         'prefix' => 'HRV'
        ]);
        $harv->Harv_Name = request('inputHarvName');
        $harv->Farmer_Id = auth()->user()->id;
        $harv->seller = auth()->user()->username;
        $harv->Harv_Desc = request('inputHarvDesc');
        $harv->Harv_Type = request('inputHarvType');
        $harv->Harv_Stock = request('inputHarvStock');
        $harv->Harv_Price = request('inputHarvPrice');
        

        $filename = '';
        if ($request->file('inputGroupImage')) {
            $image = $request->file('inputGroupImage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;
           
            $harv->Image_Harv = $filename;
        }
        
     $harv->save(); 
     return view('/dashboard/products/index',[
        "title" => "Products",
        "products" => Harvest::all()
     ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('/dashboard/products/index', [
            "title" => "Products",
            "products" => Harvest::all()
    ]);
    }

    public function showSingle(Harvest $id, $Harv_Name)
    {
        return view('prod', [
            "title" => Harvest::find($Harv_Name),
            "product" => Harvest::find($id)
        ]);
    }

    public function showForm(){
        return view('dashboard/products/addProduct', [
            "title" => "Add Product",
        ]);
    }

    public function delete($id){

        // Alert::warning('Warning Title', 'Do you want to delete this product?');    
      
            DB::table('harvests')->where('id', '=', $id)->delete();
      
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harvest $harvest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHarvestRequest $request, Harvest $harvest)
    {
        //
    }

   
}
