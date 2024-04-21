<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\OfferingController;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// Show all customer data
Route::get('/customer', [CustomerController::class, 'index']);

// Single customer data
Route::get('/customer/{id}/{Company_Name}', [CustomerController::class, 'show']);

// Show the dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');

// Show all products data
Route::get('/dashboard/products/index', [DashboardProductsController::class, 'index'])->middleware('FarmerCheck'); 

// view add products form
Route::get('/dashboard/products/index/addProduct', function () {
    return view('dashboard/products/addProduct');
});

// post new data to database
Route::post('/dashboard/products/index/addProduct', [HarvestController::class, 'store']);


// Single product data
Route::get('/products/{id}/{Harv_Name}', [HarvestController::class, 'showSingle']);


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


// Show offering 
Route::get('/dashboard/offering/index',[OfferingController::class, 'show']);

//show offering form
Route::get('/dashboard/offering/index/offer', [DashboardProductsController::class, 'cust']);

//send offering
Route::post('/dashboard/offering/index/offer',[OfferingController::class, 'sendOffer']);

//notif pusher offering
Route::get('/dashboard/index', [DashboardProductsController::class, 'show'])->middleware('auth');

//show offering notification
Route::get('/dashboard/notification', [NotificationController::class, 'show'])->middleware('auth');

//show detail offering
Route::get('/dashboard/notification/notif', [NotificationController::class, 'show'])->middleware('auth');

// Show user profile
Route::get('/dashboard/profile/index', [UserController::class, 'show'])->middleware('auth');

// Show customer table
Route::get('/dashboard/customer/index', [CustomerController::class, 'index'])->middleware('auth');