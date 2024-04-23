<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cust_Address',
        'Cust_Phone',
        'Cust_Image',
        'Purchase_Needs',
        'CustProd_Name',
        'CustProd_Desc'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
        'remember_token'
    ];
}
