<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;

use App\Models\User;
use Carbon\Carbon;

class Tripsforbranchcontroller extends Controller
{
    public function allbranchtrips(){
        $branch = auth()->guard('user-api')->user();
        $branchid = $branch->userid;

        
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();

        $tripcheck = Trips::where('airline_branch_id',$branchid)->where('year',$year)->get();
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
        return response()->json($tripsarray);
    }
    public function branchtripscomplete(){
        $branch = auth()->guard('user-api')->user();
        $branchid = $branch->userid;

        
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();

        $tripcheck = Trips::where('airline_branch_id',$branchid)->where('year',$year)->where('status',"Complete")->get();
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
        return response()->json($tripsarray);
    }


    public function branchtripscancelled(){
        $branch = auth()->guard('user-api')->user();
        $branchid = $branch->userid;

        
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();

        $tripcheck = Trips::where('airline_branch_id',$branchid)->where('year',$year)->where('status',"cancelled")->get();
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

        return response()->json($tripsarray);
    }
    public function branchpending(){
        $branch = auth()->guard('user-api')->user();
        $branchid = $branch->userid;

        
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        $tripsarray = array();

        $tripcheck = Trips::where('airline_branch_id',$branchid)->where('year',$year)->where('status',"pending")->get();
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

        return response()->json($tripsarray);


    }
}
