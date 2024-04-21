<?php


namespace App\Models;

class Customers 
{
   private static $Cust_Data = [
  
        [
            "Cust_ID" => "CM0012024",
            "Cust_Name" => "Budi",
            "Cust_Address" => "Jl.Abadi 12",
            "Cust_Phone" => "085234337811",
            "Cust_Email" => "budi@gmail.com",
            "Company_Image" => "building.jpg",
            "Company_Name" => "Shojin Restaurant",
            "Purchase_Needs" => "Potato",
            "Buy_Price" => " 50000 ",
            "CustProd_Name" => "Potato Pancake",
            "CustProd_Desc" => "Made from shred potato and cheese",
            "CustProd_Image" => "potatoPancake.jpg",
        ],
        [
            "Cust_ID" => "CM0022024",
            "Cust_Name" => "Iwan",
            "Cust_Address" => "Jl. Pattimura",
            "Cust_Phone" => "081243667012",
            "Cust_Email" => "iwan@gmail.com",
            "Company_Image" => "mybuild.jpg",
            "Company_Name" => "Suka Suka Restaurant",
            "Purchase_Needs" => "Tomato",
            "Buy_Price" => "200000 ",
            "CustProd_Name" => "Pizza",
            "CustProd_Desc" => "Italian dish that popular in Indonesia",
            "CustProd_Image" => "pizzapizza.jpg",
        ]
        ];


    public static function all(){
        // collect : wrsp the array into collection
        return collect(self::$Cust_Data);
        }

    public static function find($Cust_ID){

        $customer = static::all();
       
        return $customer->firstWhere('Cust_ID', $Cust_ID);
    }

  
    }


