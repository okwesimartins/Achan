<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;
use Validator;
use Carbon\Carbon;
class Booktrips extends Controller
{
    public function booktrip(Request $request){
        $random = mt_rand(100000, 999999);
        $ticketrad= mt_rand(100, 999);
        $carbondate=Carbon::now();


        $firstname=$request->firstname;
        $surname = $request->surname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        $from = $request->from;
        $to = $request->to;
        $date = $request->date;
        $time = $request->time;
        $returndate = $request->returndate;
        $returntime = $request->returntime;
       
        $state= $request->state;

        $day= $carbondate->day;
        $year=$carbondate->year;
        $month= $carbondate->format('F');

        $destarea = $request->dest_address;
        $estmin = $request->estmin;
        $estmax = $request->estmax;
        $tripid = "ach".$random ;
        $ticket = "#".$ticketrad;
        $airlineid = $request->airid;
        $bookingdate = $carbondate->toDateString();
        $bookingtime= $carbondate->format('g:i:s a');
        
          if($returndate && $returntime){
               
            $create_trip= Trips::create([
                'trip_from'=>$from,
                'trip_to'=>$to,
                'trip_type'=>"Local",
                'passenger_name'=>$firstname,
                'email'=>$email,
                'surname'=>$surname,
                'passenger_phone'=>$phonenumber,
                'trip_id'=> $tripid,
                'date'=>$date,
                'time'=>$time,
                'booking_date'=>$bookingdate,
                'booking_time'=>$bookingtime,
                
                'status'=>"pending",
                'day'=>$day,
                'month'=>$month,
                'year'=>$year,
                'dest_area'=>$destarea,
                'state'=>$state,
                'est_min'=>$estmin,
                'est_max'=>$estmax,
                'pay_status'=>"pending",
                'tickets'=>$ticket,
                'airline_branch_id'=>$airlineid
         ]);
          
         $create_trip2= Trips::create([
            'trip_from'=> $destarea,
            'trip_to'=>$from,
            'trip_type'=>"Local",
            'passenger_name'=>$firstname,
            'email'=>$email,
            'surname'=>$surname,
            'passenger_phone'=>$phonenumber,
            'trip_id'=> $tripid,
            'date'=>$returndate,
            'time'=>$returntime,
            'booking_date'=>$bookingdate,
            'booking_time'=>$bookingtime,
            'status'=>"pending",
            'day'=>$day,
            'month'=>$month,
            'year'=>$year,
            'dest_area'=>$from,
            'state'=>$state,
            'est_min'=>$estmin,
            'est_max'=>$estmax,
            'pay_status'=>"pending",
            'tickets'=>$ticket,
            'airline_branch_id'=>$airlineid
     ]);
         return response()->json([
             "first_ticket"=>[   
            "trip_id"=> $create_trip->id,
             "phone_number"=>$create_trip->passenger_phone,
             "ticket_num"=>$create_trip->tickets,
             "date"=>$create_trip->date,
             "time"=>$create_trip->time,
             "from"=>$create_trip->trip_from,
             "destination"=>$create_trip->trip_to
             ],
             "second_ticket"=>[
                "trip_id"=> $create_trip2->id,
                "phone_number"=>$create_trip2->passenger_phone,
                "ticket_num"=>$create_trip2->tickets,
                "date"=>$create_trip2->date,
                "time"=>$create_trip2->time,
                "from"=>$create_trip2->trip_from,
                "destination"=>$create_trip2->trip_to
             ]
            
         ]);

          }else{
            $create_trip= Trips::create([
                'trip_from'=>$from,
                'trip_to'=>$to,
                'trip_type'=>"Local",
                'passenger_name'=>$firstname,
                'email'=>$email,
                'surname'=>$surname,
                'passenger_phone'=>$phonenumber,
                'trip_id'=> $tripid,
                'date'=>$date,
                'time'=>$time,
                'booking_date'=>$bookingdate,
                'booking_time'=>$bookingtime,
                'status'=>"pending",
                'day'=>$day,
                'month'=>$month,
                'year'=>$year,
                'dest_area'=>$destarea,
                'state'=>$state,
                'est_min'=>$estmin,
                'est_max'=>$estmax,
                'pay_status'=>"pending",
                'tickets'=>$ticket,
                'airline_branch_id'=>$airlineid
         ]);

         return response()->json([
             
           "trip_id"=> $create_trip->id,
            "phone_number"=>$create_trip->passenger_phone,
            "ticket_num"=>$create_trip->tickets,
            "date"=>$create_trip->date,
            "time"=>$create_trip->time,
            "from"=>$create_trip->trip_from,
            "destination"=>$create_trip->trip_to
            
        
           
        ]);
          }
     



    }
}
