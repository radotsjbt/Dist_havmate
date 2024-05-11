<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\OfferingController;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Models\Harvest;
use App\Models\Order;

Route::get('/', function() {
    return view('/home/main', [
        "title" => "Home"
    ]);
});

//view registration page
Route::get('/auth/regist', function () {
    return view('/auth/regist', [
        "title" => "Register"
    ]);
})->middleware('guest');

//post the new user's data to database using controller
Route::post('/auth/regist', [UserController::class, 'store']);

//view login page
Route::get('/auth/login', function () {
    return view('/auth/login', [
        "title" => "Login"
    ]);
});

//Post Login
Route::post('/auth/login',[UserController::class,'authenticate']);

// Show the dashboard
Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');

//Logout
Route::post('/logout', [UserController::class,'logout']);

// Show detail user profile
Route::get('/dashboard/profile/index/{id}', [UserController::class, 'show'])->middleware('auth');

// Update user profile
Route::post('/dashboard/profile/update/{id}', [UserController::class, 'update'])->middleware('auth');





// Farmer
// Show all products data
Route::get('/dashboard/products/index', [HarvestController::class, 'show'])->middleware('FarmerCheck'); 

// view add products form
Route::get('/dashboard/products/index/addProduct', [HarvestController::class, 'showForm'])->middleware('auth');

// add new product to database
Route::post('/dashboard/products/index', [HarvestController::class, 'addProduct'])->middleware('auth');

// delete product data
Route::get('/dashboard/products/index/{id}', [HarvestController::class, 'deleteProduct'])->middleware('auth');

// edit product data
Route::get('/dashboard/products/editProd/{id}', [HarvestController::class, 'editProduct'])->middleware('auth');

// update product data
Route::post('/dashboard/products/update/{id}', [HarvestController::class, 'updateProduct'])->middleware('auth');


// Offering
// Show offering to farmer (distributor's page)
Route::get('/dashboard/offering/toDistributor/index',[OfferingController::class, 'showToFarmer']);

// Show offering to distributor (farmer's page)
Route::get('/dashboard/offering/fromFarmer/index',[OfferingController::class, 'showToDistributor']);

//show offering form
Route::get('/dashboard/offering/offer/{id}', [OfferingController::class, 'showForm']);

//send offering to the customer1
Route::post('/dashboard/offering/index/{id}',[OfferingController::class, 'sendOffer'])->middleware('auth');

// delete offering data
Route::get('/dashboard/offering/index/{id}', [OfferingController::class, 'delete'])->middleware('auth');

// edit offering data
Route::get('/dashboard/offering/editOff/{id}', [OfferingController::class, 'edit'])->middleware('auth');

// update offering data
Route::post('/dashboard/offering/update/{id}', [OfferingController::class, 'update'])->middleware('auth');

// accept offering
Route::get('/dashboard/offering/fromFarmer/acceptOffering/{id}', [OfferingController::class, 'acceptOffering'])->middleware('auth');

// decline offering
Route::get('/dashboard/offering/fromFarmer/declineOffering/{id}', [OfferingController::class, 'declineOrder'])->middleware('auth');


// notif pusher offering
// Route::get('/dashboard/index', [DashboardProductsController::class, 'show'])->middleware('auth');




// Distributor 
//show offering notification
Route::get('/dashboard/notification', [NotificationController::class, 'show'])->middleware('auth');

//show detail offering to the farmer
Route::post('/dashboard/notification/notif', [NotificationController::class, 'show'])->middleware('auth');

// Show all customer to the farmer
Route::get('/dashboard/distributor/index', [DistributorController::class, 'showDistributor'])->middleware('auth');

// Show detail customer to the farmer
Route::get('/dashboard/distributor/dist/{id}', [DistributorController::class, 'showSingle'])->middleware('auth');

// Show form for customer's needs
Route::post('/dashboard/notification/notif', [DistributorController::class, 'updateData'])->middleware('auth');


// Order
// Show order status
Route::get('/dashboard/ordering/index', [OrderController::class, 'showAll'])->middleware('auth');

// Show products from farmers
Route::get('/dashboard/products/index', [HarvestController::class, 'show'])->middleware('auth');

// Show detail product for order
Route::get('/dashboard/products/prod/{id}', [HarvestController::class, 'showSingle'])->middleware('auth');

// Show order form
Route::get('/dashboard/ordering/order/{id}', [OrderController::class, 'showForm'])->middleware('auth');

// Send order to farmer
Route::post('/dashboard/ordering/index/{id}', [OrderController::class, 'sendOrder'])->middleware('auth');

// delete order data
Route::get('/dashboard/ordering/index/{id}', [OrderController::class, 'deleteOrder'])->middleware('auth');

// edit order data
Route::get('/dashboard/ordering/editOrder/{id}', [OrderController::class, 'editOrder'])->middleware('auth');

// update order data
Route::post('/dashboard/ordering/update/{id}', [OrderController::class, 'updateOrder'])->middleware('auth');
