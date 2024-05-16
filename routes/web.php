<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RadotProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\OfferingController;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Models\Harvest;
use App\Models\Order;


use App\Events\MessageSent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RadotDistributorController;
use App\Http\Controllers\RadotOfferingController;
use App\Http\Controllers\OrderingController;
use App\Http\Controllers\ProductController;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Request;

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
Route::get('/login', function () {
    return view('/auth/login', [
        "title" => "Login"
    ]);
});

//Post Login
Route::post('/auth/login',[UserController::class,'authenticate']);

// Show the dashboard
Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');

//Logout
Route::get('/logout', [UserController::class,'logout']);

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
// Show offering 
Route::get('/dashboard/offering/index',[OfferingController::class, 'show'])->name('offering_index');
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

Route::get('/dashboard/offering/accept/{id}', [OfferingController::class, 'accept'])->middleware('auth');
// Route::get('/dashboard/offering/accept/{id}', [OfferingController::class, 'accept'])->middleware('auth');
// accept offering
Route::get('/dashboard/offering/fromFarmer/acceptOffering/{id}', [OfferingController::class, 'acceptOffering'])->middleware('auth');

// decline offering
Route::get('/dashboard/offering/fromFarmer/declineOffering/{id}', [OfferingController::class, 'declineOffering'])->middleware('auth');


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


Route::get('/dashboard/distributor/rekomendasi', [DistributorController::class, 'rekomendasi'])->middleware('auth')->name('rekomendasi');

// Order
// Show order status to farmer's page
Route::get('/dashboard/ordering/fromDistributor/index', [OrderController::class, 'showToFarmer'])->middleware('auth');

// Show order status to distributor's page
Route::get('/dashboard/ordering/fromDistributor/index', [OrderController::class, 'showToDistributor'])->middleware('auth');

// Show products from farmers
Route::get('/dashboard/products/index', [HarvestController::class, 'show'])->middleware('auth');

// Show detail product for order
Route::get('/dashboard/products/prod/{id}', [HarvestController::class, 'showSingle'])->middleware('auth');

// Show order form
Route::get('/dashboard/ordering/order/{id}', [OrderController::class, 'showForm'])->middleware('auth');
Route::get('/orderProduk/{id}', [OrderController::class, 'showForm'])->middleware('auth')->name('orderProduk');
Route::get('/new_order', [OrderController::class, 'new_order'])->middleware('auth')->name('new_order');
Route::post('/sendOrderNew', [OrderController::class, 'sendOrderNew'])->middleware('auth')->name('sendOrderNew');



// Send order to farmer
Route::post('/dashboard/ordering/index/{id}', [OrderController::class, 'sendOrder'])->middleware('auth');

// delete order data
Route::get('/dashboard/ordering/index/{id}', [OrderController::class, 'deleteOrder'])->middleware('auth');
Route::get('/detailProduk/{id}', [DistributorController::class, 'detailProduk'])->middleware('auth')->name('detailProduk');
// Route::get('/orderProduk/{id}', [DistributorController::class, 'orderProduk'])->middleware('auth')->name('orderProduk');
// Route::get('/chat/{id}', [DistributorController::class, 'chat'])->middleware('auth')->name('chat');

Route::get('/chat/{id}', [ChatController::class, 'getChatById'])->name('getChatById');

// edit order data
Route::get('/dashboard/ordering/editOrder/{id}', [OrderController::class, 'editOrder'])->middleware('auth');

// update order data
Route::post('/dashboard/ordering/update/{id}', [OrderController::class, 'updateOrder'])->middleware('auth');

Route::get('/chat', [ChatController::class, 'getDistributors'])->name('chat.page');
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
Route::resource('distributors',RadotDistributorController::class);
Route::resource('products',RadotProductController::class);
// Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
// Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('/fetch-messages/{receiverId}', [ChatController::class, 'fetchMessages']);
// Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('post-login',[AuthController::class,'postlogin'])->name('post.login');
Route::post('/import-excel', [RadotDistributorController::class, 'store'])->name('import.excel');
Route::get('order-form/{id}',[RadotProductController::class,'order_page'])->name('order.form');
Route::post('order-post',[RadotProductController::class,'ordering'])->name('order.post');

Route::get('offering',[RadotOfferingController::class,'index'])->name('offering.index');
Route::post('offering-submit',[RadotOfferingController::class,'store'])->name('offering.store');

Route::get('history-ordering',[OrderingController::class,'index'])->name('ordering.history');
Route::post('accept-ordering/{id}',[OrderingController::class,'acceptOrdering'])->name('accept.ordering');
Route::post('decline-ordering/{id}',[OrderingController::class,'declineOrdering'])->name('decline.ordering');
Route::post('accept-offering/{id}',[OfferingController::class,'acceptOffering'])->name('offering.accept');
Route::post('decline-offering/{id}',[OfferingController::class,'declineOffering'])->name('offering.decline');
Route::post('search-product',[RadotProductController::class,'searchProduct'])->name('search.product');
Route::get('history-ordering-distributor',[OrderingController::class,'historyOrderingForDistributor'])->name('history.distributor');
Route::get('get-history-offering-distributor',[RadotOfferingController::class,'getHistoryDistributor'])->name('historydistributor.offering');

Route::get('farmer-recomendation',[RadotProductController::class,'recomendationFarmer'])->name('farmer.recomendation');
Route::get('/broadcast', function() {
    $message = Message::create([
        'receiver_id' => 2,
        'sender_id' => 1,
        'message' => "halooo"
    ]);
    event(new MessageSent($message));

    return 'ok';
});

// Route::post('/broadcasting/auth', function (Request $request) {
//     return Broadcast::auth($request);
// })->middleware('auth');

// Route::post('/broadcasting/auth', function (Request $request) {
//     $user = Auth::user(); // Assuming you're using Laravel's authentication
//     dd($user);
//     if (!$user) {
//         // If user is not authenticated, return a 403 Forbidden response
//         return response()->json(['error' => 'Unauthorized'], 403);
//     }
    
//     $socket_id = $request->input('socket_id');
//     $channel_name = $request->input('channel_name');
    
//     // Here you might perform additional checks, such as verifying if the user has access to the channel
    
//     $pusher = new Pusher\Pusher(
//         env('PUSHER_APP_KEY'),
//         env('PUSHER_APP_SECRET'),
//         env('PUSHER_APP_ID'),
//         [
//             'cluster' => env('PUSHER_APP_CLUSTER'),
//             'encrypted' => true
//         ]
//     );
    
//     // Generate the authentication token for the user and channel
//     $auth = $pusher->socket_auth($channel_name, $socket_id, ['user_id' => $user->id]);
    
//     return response()->json($auth);
// });

Route::get('/get-notification-count', [OfferingController::class, 'getNotificationCount'])->name('getNotificationCount');