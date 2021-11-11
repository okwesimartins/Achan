<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
class Tripscontroller extends Controller
{
    public function admintrips(){
        $branch = auth()->guard('admin-api')->user()->branches()->get();
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();
        foreach($branch as $value){
            $userid= $value->userid;
            $tripcheck = Trips::where('airline_branch_id',$userid)->where('year',$year)->get();

            if(empty($tripcheck)){
               return response()->json(["status"=>"failed","message"=>"No trips yet"]);
            }else{

                foreach($tripcheck as $value1){
                    $trip= [
                        "customer_name"=> $value1->passenger_name,
                        "location"=> $value1->trip_from,
                        "destination"=>$value1->dest_area,
                        "booking_date"=>$value1->booking_date,
                        "booking_time"=>$value1->booking_time,
                        "status"=>$value1->status
                    ];
                    array_push($tripsarray, $trip);
                }
            
            }


        }

         return response()->json($tripsarray);

    }

    //completed trips for admin

    public function admincompletedtrip(){
           
        $branch = auth()->guard('admin-api')->user()->branches()->get();
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();
        foreach($branch as $value){
            $userid= $value->userid;
            $complete="Complete";
            $tripcheck = Trips::where('airline_branch_id',$userid)->where('year',$year)->where('status', $complete)->get();
          
           

                foreach($tripcheck as $value1){
                    $trip= [
                        "customer_name"=> $value1->passenger_name,
                        "location"=> $value1->trip_from,
                        "destination"=>$value1->dest_area,
                        "booking_date"=>$value1->booking_date,
                        "booking_time"=>$value1->booking_time,
                        "status"=>$value1->status
                    ];
                    array_push($tripsarray, $trip);
                }
            
            


        }

         return response()->json($tripsarray);

    }

// admin pending trip
public function adminpendingtrip(){
           
    $branch = auth()->guard('admin-api')->user()->branches()->get();
    $carbondate=Carbon::now();
    $year=$carbondate->year;
    $tripsarray = array();
    foreach($branch as $value){
        $userid= $value->userid;
        $tripcheck = Trips::where('airline_branch_id',$userid)->where('year',$year)->where('status',"pending")->get();

   

            foreach($tripcheck as $value1){
                $trip= [
                    "customer_name"=> $value1->passenger_name,
                    "location"=> $value1->trip_from,
                    "destination"=>$value1->dest_area,
                    "booking_date"=>$value1->booking_date,
                    "booking_time"=>$value1->booking_time,
                    "status"=>$value1->status
                ];
                array_push($tripsarray, $trip);
            }
        
        


    }

     return response()->json($tripsarray);

}

// admin cancelled trips

 public function cancelledtrips(){
    $branch = auth()->guard('admin-api')->user()->branches()->get();
    $carbondate=Carbon::now();
    $year=$carbondate->year;
    $tripsarray = array();
    foreach($branch as $value){
        $userid= $value->userid;
        $tripcheck = Trips::where('airline_branch_id',$userid)->where('year',$year)->where('status',"cancelled")->get();
        
        
      
            foreach($tripcheck as $value1){
                $trip= [
                    "customer_name"=> $value1->passenger_name,
                    "location"=> $value1->trip_from,
                    "destination"=>$value1->dest_area,
                    "booking_date"=>$value1->booking_date,
                    "booking_time"=>$value1->booking_time,
                    "status"=>$value1->status
                ];
                array_push($tripsarray, $trip);
            }
        
        


    }

     return response()->json($tripsarray);
 }
}
