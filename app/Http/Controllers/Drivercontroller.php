<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\driver;
use App\Models\Trips;
class Drivercontroller extends Controller
{
    public function sellectdriver(Request $request){
         $tripid=$request->id;

        $checkdriver = Trips::where('id',$tripid)->first();
        
        if($checkdriver){
            
            if($checkdriver->driver_id){
               
                $driverid=$checkdriver->driver_id;
               
                $driver= driver::where('driver_id',$driverid)->first();
                dd($driver);

                return response()->json([
                    "name"=> $driver->name,
                    "email"=> $driver->email,
                    "phone_number"=>$driver->phone,
                    "car_name"=> $driver->car_name,
                    "license_plate"=> $driver->license_plate
                ]);
            }else{
                return response()->json([
                    "status"=>"failed",
                    "message"=>"No driver assigned yet"
                ]);
            }
        }else{
            return response()->json([
                "status"=>"failed",
               
            ]);
        }
    }
}
