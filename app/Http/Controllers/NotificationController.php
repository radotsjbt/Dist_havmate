<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offering;

class NotificationController extends Controller
{
    public function show()
    {
        return view('dashboard.notification.notif', [   
            'offer' => Offering::all()     
            ]);
    }
}
