<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\OfferingController;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Models\Customer;
use PhpParser\Node\Stmt\Use_;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});


// Show the dashboard
Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');


//view registration page
Route::get('/regist', function () {
    return view('regist', [
        "title" => "Register"
    ]);
})->middleware('guest');

//post the new user's data to database using controller
Route::post('/regist', [UserController::class, 'store']);

//view login page
Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});

//Post Login
Route::post('/login',[LoginController::class,'authenticate']);

//Logout
Route::post('/logout', [LoginController::class,'logout']);

// User Profile
Route::get('/userProfile', function () {
    return view('dashboard.profile.userProfile');
});



// Farmer
// Show all products data
Route::get('/dashboard/products/index', [DashboardProductsController::class, 'show'])->middleware('FarmerCheck'); 

// view add products form
Route::get('/dashboard/products/index/addProduct', [HarvestController::class, 'showForm'])->middleware('auth');

// post new product to database
Route::post('/dashboard/products/addProduct', [HarvestController::class, 'store'])->middleware('auth');

// Single product data
Route::get('/products/{id}/{Harv_Name}', [HarvestController::class, 'showSingle']);

// Show offering 
Route::get('/dashboard/offering/index',[OfferingController::class, 'show']);

//show offering form
Route::get('/dashboard/offering/index/offer', [DashboardProductsController::class, 'cust']);

//send offering to the customer
Route::post('/dashboard/offering/index/offer',[OfferingController::class, 'sendOffer']);

//notif pusher offering
Route::get('/dashboard/index', [DashboardProductsController::class, 'show'])->middleware('auth');

// Show detail user profile
Route::get('/dashboard/profile/index/{id}', [UserController::class, 'show'])->middleware('auth');



// Distributor 
//show offering notification
Route::get('/dashboard/notification', [NotificationController::class, 'show'])->middleware('auth');

//show detail offering to the farmer
Route::post('/dashboard/notification/notif', [NotificationController::class, 'show'])->middleware('auth');

// Show all customer to the farmer
Route::get('/dashboard/customer/index', [CustomerController::class, 'index'])->middleware('auth');

// Show detail customer to the farmer
Route::get('/dashboard/customer/cust/{id}', [CustomerController::class, 'showSingle'])->middleware('auth');

// Show form for customer's needs
Route::post('/dashboard/notification/notif', [CustomerController::class, 'updateData'])->middleware('auth');
