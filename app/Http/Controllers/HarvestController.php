<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\User;
use App\Http\Requests\UpdateHarvestRequest;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
        $harv->farmer_id = auth()->user()->id;
        $harv->seller = auth()->user()->username;
        $harv->Harv_Desc = request('inputHarvDesc');
        $harv->Harv_Type = request('inputHarvType');
        $harv->Harv_Stock = request('inputHarvStock');
        $harv->Harv_Price = request('inputHarvPrice');
        $harv->Image_Harv = request('inputGroupImage');
     

        if($request->file('inputGroupImage')){
            $file= $request->file('inputGroupImage');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/inputGroupImage'), $filename);
            $data['inputGroupImage']= $filename;

            $harv->Image_Harv = $data['inputGroupImage'];
        }
        
        // $data->save();
        // return redirect()->route('images.view');

     $harv->save(); 
     return redirect('dashboard/products/index');
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
            "title" => "Farmer Product",
        ]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harvest $harvest)
    {
        //
    }
}
