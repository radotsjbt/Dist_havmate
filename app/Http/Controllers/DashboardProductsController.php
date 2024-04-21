<?php

namespace App\Http\Controllers;

use App\Events\OfferingNotification;
use App\Models\Harvest;
use App\Models\Offering;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // authorization role for accessing the product page using Gate
        $this->authorize('FarmerCheck');
        
        
        return view('dashboard.products.index', [
            'products' => Harvest::all(),
            'title' => 'Products'
            ]);
        
            // authorization role for distributor
         $this->authorize('DistributorCheck');
         
         return view('dashboard.notification.');

    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function cust()
    {
        return view('dashboard.offering.offer', [
            
            'product' => Harvest::all(),
            'user' => User::all()   
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Harvest $harvest)
    {
        event(new OfferingNotification('Halo ada yang menawarkan produk!'));

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
    public function update(Request $request, Harvest $harvest)
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
