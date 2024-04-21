<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Harvest extends Model
{
    use HasFactory;

    public $table ='harvests';

    // relation between products and user
    public function user(){
        return $this->belongsTo(User::class);
    }
    // relation between products and offering
    public function offering(){
        return $this->hasMany(Offering::class);
    }
    // relation between products and customer
    public function customer(){
        return $this->hasMany(Customers::class);
    }

    protected $fillable = [
        'Harv_Name',
        'Harv_Desc',
        'Harv_Type',
        'Harv_Stock',
        'Harv_Price',
        'Image_Harv',
        'Video_Harv'
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