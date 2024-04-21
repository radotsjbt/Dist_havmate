<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $fillable = [
        'Cust_Name',
        'Harv_Name',
        'Qty',
        'Total_Price',
        'Notes'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
        'remember_token'
    ];

    public $table ='offering';

    // relation between offering and user (1 to 1)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relation between offering and customer (1 to 1)
    public function customer(){
        return $this->belongsTo(Customers::class);
    }

    //relation between offering and products (many to many)
    public function harvest(){
        return $this->hasMany(Harvest::class);
    }

    
}
