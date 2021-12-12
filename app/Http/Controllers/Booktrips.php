<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;
use App\Models\Achanprices;
use App\Models\User;
use App\Models\achan_branch;
use App\Models\driver;
use Validator;
use Carbon\Carbon;
class Booktrips extends Controller
{   
    public function firstbookingform(Request $request){
            
        $random = mt_rand(100000, 999999);
        $ticketrad= mt_rand(1000, 9999);
        $carbondate=Carbon::now();

        $firstname=$request->firstname;
        $surname = $request->surname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        
        $from = $request->pickup_area;
        $date = $request->date;
        $time = $request->time;

        $day= $carbondate->day;
        $year=$carbondate->year;
        $month= $carbondate->format('F');

        
        $estmin = $request->estmin;
        $estmax = $request->estmax;
        $tripid = "ach".$random ;
        $ticket = "#".$ticketrad;
        $airlineid = $request->airid;
        $bookingdate = $carbondate->toDateString();
        $bookingtime= $carbondate->format('g:i:s a');
        $user = User::where('userid',$airlineid)->first();
        $state= $user->state;
        
        
        $pickupaddress = $request->pickup_address;
        $to = $user->branch_location;
        $achanbranchloca = achan_branch::where('airport',$to)->first();
        $phone_num= $achanbranchloca->phone_num;
        $whatapp= $achanbranchloca->wha_num;
        
        $driver= driver::inRandomOrder()->first();
        $driver_id= $driver->driver_id;
        
        
        
        $create_trip= Trips::create([
            'trip_from'=>$from,
            'trip_to'=>$to,
            'trip_type'=>"Local",
            'passenger_name'=>$firstname,
            'email'=>$email,
            'surname'=>$surname,
            'passenger_phone'=>$phonenumber,
            'driver_id'=>$driver_id,
            'trip_id'=> $tripid,
            'date'=>$date,
            'time'=>$time,
            'booking_date'=>$bookingdate,
            'booking_time'=>$bookingtime,

            'status'=>"pending",
            'day'=>$day,
            'month'=>$month,
            'year'=>$year,
            
            'state'=>$state,
            'est_min'=>$estmin,
            'est_max'=>$estmax,
            'pay_status'=>"pending",
            'tickets'=>$ticket,
            'airline_branch_id'=>$airlineid,
            'pickup_address'=> $pickupaddress
     ]);


     return response()->json([
        "first_ticket"=>[
         "trip_id"=> $create_trip->id,
         "phone_number"=>$create_trip->passenger_phone,
         "ticket_num"=>$create_trip->tickets,
         "date"=>$create_trip->date,
         "email"=>$create_trip->email,
         'passenger_name'=>$create_trip->passenger_name,
         "time"=>$create_trip->time,
         "from"=>$create_trip->trip_from,
         "destination"=>$create_trip->trip_to,
         "phone_num"=>$phone_num,
         "whatapp"=>$whatapp
        ]
        
     ]);


    }

    
    public function secondbookingform(Request $request){
           
           
        $random = mt_rand(100000, 999999);
        $ticketrad= mt_rand(1000, 9999);
        $carbondate=Carbon::now();


        $firstname=$request->firstname;
        $surname = $request->surname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
       
        $to = $request->to;
        $date = $request->date;
        $time = $request->time;
       
       
       
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
        $user = User::where('userid',$airlineid)->first();
        $state= $user->state;
        
        

        $from = $user->branch_location;
        $achanbranchloca = achan_branch::where('airport',$from)->first();
        $phone_num= $achanbranchloca->phone_num;
        $whatapp= $achanbranchloca->wha_num;


        $driver= driver::inRandomOrder()->first();
        $driver_id= $driver->driver_id;
        

        $create_trip= Trips::create([
            'trip_from'=>$from,
            'trip_to'=>$to,
            'trip_type'=>"Local",
            'passenger_name'=>$firstname,
            'email'=>$email,
            'surname'=>$surname,
            'passenger_phone'=>$phonenumber,
            'driver_id'=>$driver_id,
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
        "first_ticket"=>[
         "trip_id"=> $create_trip->id,
         "phone_number"=>$create_trip->passenger_phone,
         "ticket_num"=>$create_trip->tickets,
         "date"=>$create_trip->date,
         "email"=>$create_trip->email,
         'passenger_name'=>$create_trip->passenger_name,
         "time"=>$create_trip->time,
         "from"=>$create_trip->trip_from,
         "destination"=>$create_trip->trip_to,
         "phone_num"=>$phone_num,
         "whatapp"=>$whatapp
        ]
        
     ]);


           
    }
    
    public function thirdbookingform(Request $request){
            
        $random = mt_rand(100000, 999999);
        $ticketrad= mt_rand(1000, 9999);
        $carbondate=Carbon::now();


        $firstname=$request->firstname;
        $surname = $request->surname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
       
        $to = $request->to;
        $date = $request->date;
        $time = $request->time;
       
       
       
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
        $user = User::where('userid',$airlineid)->first();
        $state= $user->state;
        
        

        $from = $user->branch_location;
        $achanbranchloca = achan_branch::where('airport',$from)->first();
        $phone_num= $achanbranchloca->phone_num;
        $whatapp= $achanbranchloca->wha_num;


        $driver= driver::inRandomOrder()->first();
        $driver_id= $driver->driver_id;
        
        $pickupaddress=$request->pickupaddress;
        $secondfrom = $request->pickup_area;
        $depatureairport_id=$request->id;
        $depatureairport = User::where('userid',$depatureairport_id)->first();
        $airport_state= $depatureairport->state;
        $secondto =  $depatureairport->branch_location;
        $secondrandom = mt_rand(100000, 999999);
        $secondtripid = "ach".$secondrandom;

        $achanbranch2 = achan_branch::where('airport',$secondfrom)->first();
        $phone_num2= $achanbranch2->phone_num;
        $whatapp2=  $achanbranch2->wha_num;
       //first booking
   
       $create_trip= Trips::create([
        'trip_from'=>$from,
        'trip_to'=>$to,
        'trip_type'=>"Local",
        'passenger_name'=>$firstname,
        'email'=>$email,
        'surname'=>$surname,
        'passenger_phone'=>$phonenumber,
        'driver_id'=>$driver_id,
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




        //second booking
       
        $create_trip2= Trips::create([
            'trip_from'=>$secondfrom,
            'trip_to'=>$secondto,
            'trip_type'=>"Local",
            'passenger_name'=>$firstname,
            'email'=>$email,
            'surname'=>$surname,
            'passenger_phone'=>$phonenumber,
            'driver_id'=>$driver_id,
            'trip_id'=> $secondtripid,
            'date'=>$date,
            'time'=>$time,
            'booking_date'=>$bookingdate,
            'booking_time'=>$bookingtime,

            'status'=>"pending",
            'day'=>$day,
            'month'=>$month,
            'year'=>$year,
            
            'state'=>$airport_state,
            'est_min'=>$estmin,
            'est_max'=>$estmax,
            'pay_status'=>"pending",
            'tickets'=>$ticket,
            'airline_branch_id'=>$airlineid,
            'pickupaddress'=>  $pickupaddress
     ]);

     return response()->json([
        "first_ticket"=>[   
        "trip_id"=> $create_trip->id,
         "phone_number"=>$create_trip->passenger_phone,
         "ticket_num"=>$create_trip->tickets,
         "email"=>$create_trip->email,
         'passenger_name'=>$create_trip->passenger_name,
         
         "date"=>$create_trip->date,
         "time"=>$create_trip->time,
         "from"=>$create_trip->trip_from,
         "destination"=>$create_trip->trip_to,
         "phone_num"=>$phone_num,
         "whatapp"=>$whatapp
         ],
         "second_ticket"=>[
            "trip_id"=> $create_trip2->id,
            "phone_number"=>$create_trip2->passenger_phone,
            "ticket_num"=>$create_trip2->tickets,
            "email"=>$create_trip2->email,
            'passenger_name'=>$create_trip2->passenger_name,
           
            "date"=>$create_trip2->date,
            "time"=>$create_trip2->time,
            "from"=>$create_trip2->trip_from,
            "destination"=>$create_trip2->trip_to,
            "phone_num"=>$phone_num2,
            "whatapp"=>$whatapp2
         ]
        
     ]);

    }
    public function booktrip(Request $request){
        $random = mt_rand(100000, 999999);
        $ticketrad= mt_rand(100, 999);
        $carbondate=Carbon::now();


        $firstname=$request->firstname;
        $surname = $request->surname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
       
        $to = $request->to;
        $date = $request->date;
        $time = $request->time;
        $returndate = $request->returndate;
        $returntime = $request->returntime;
       
       
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
        $user = User::where('userid',$airlineid)->first();
        $state= $user->state;
        
        

        $from = $user->branch_location;
        $achanbranchloca = achan_branch::where('airport',$from)->first();
        $phone_num= $achanbranchloca->phone_num;
        $whatapp= $achanbranchloca->wha_num;
        
        $driver= driver::inRandomOrder()->first();
        $driver_id= $driver->driver_id;
          if($returndate && $returntime){
             


            $create_trip= Trips::create([
                'trip_from'=>$from,
                'trip_to'=>$to,
                'trip_type'=>"Local",
                'passenger_name'=>$firstname,
                'email'=>$email,
                'surname'=>$surname,
                'passenger_phone'=>$phonenumber,
                'driver_id'=>$driver_id,
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
            'driver_id'=>$driver_id,
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
             "email"=>$create_trip->email,
             'passenger_name'=>$create_trip->passenger_name,
             
             "date"=>$create_trip->date,
             "time"=>$create_trip->time,
             "from"=>$create_trip->trip_from,
             "destination"=>$create_trip->trip_to,
             "phone_num"=>$phone_num,
             "whatapp"=>$whatapp
             ],
             "second_ticket"=>[
                "trip_id"=> $create_trip2->id,
                "phone_number"=>$create_trip2->passenger_phone,
                "ticket_num"=>$create_trip2->tickets,
                "email"=>$create_trip2->email,
                'passenger_name'=>$create_trip2->passenger_name,
               
                "date"=>$create_trip2->date,
                "time"=>$create_trip2->time,
                "from"=>$create_trip2->trip_from,
                "destination"=>$create_trip2->trip_to,
                "phone_num"=>$phone_num,
                "whatapp"=>$whatapp
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
                'driver_id'=>$driver_id,
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

           "first_ticket"=>[
            "trip_id"=> $create_trip->id,
            "phone_number"=>$create_trip->passenger_phone,
            "ticket_num"=>$create_trip->tickets,
            "date"=>$create_trip->date,
            "email"=>$create_trip->email,
            'passenger_name'=>$create_trip->passenger_name,
            "time"=>$create_trip->time,
            "from"=>$create_trip->trip_from,
            "destination"=>$create_trip->trip_to,
            "phone_num"=>$phone_num,
            "whatapp"=>$whatapp
           ]
           
            
        
           
        ]);
          }
     



    }

    public function getestimate(Request $request){
           $destination = $request->destination;
           $fromid = $request->id;
           $destination_address= $request->dest_address;
           $date = $request->date;
            $time = $request->time;
   
            $returndate = $request->returndate;
            $returntime = $request->returntime;
            $user = User::where('userid',$fromid)->first();
            $from = $user->branch_location;
            if($returndate && $returntime){
                $price = Achanprices::select('area','price')->where('area',$destination )->first();
               
                $ext_min=$price['price'];
                $int_min=(int)$ext_min ;
                $incrementby=500;
                $ext_max= $int_min + $incrementby;
                $ext_max2=(string)$ext_max;
                return response()->json([
                       "first_cost"=>[
                           "from"=> $from,
                           "to"=>  $destination_address,
                           "date"=>$date,
                           "est_min"=>$ext_min,
                           "est_max"=>$ext_max2
                       ],
                       "second_cost"=>[
                        "from"=> $destination_address,
                        "to"=>  $from,
                        "date"=>$date,
                        "est_min"=>$ext_min,
                        "est_max"=>$ext_max2
                    ]
                ]);
                 
            }else{
                $price = Achanprices::select('area','price')->where('area',$destination )->first();
                $ext_min=$price['price'];
                $int_min=(int)$ext_min;
                $incrementby=500;
                $ext_max= $int_min + $incrementby;
                $ext_max2=(string)$ext_max;
                return response()->json([
                       
                           "from"=> $from,
                           "to"=>  $destination_address,
                           "date"=>$date,
                           "est_min"=>$ext_min,
                           "est_max"=>$ext_max2
                ]);
            }
           


    }
    
    public function destinationarea(Request $request){
           $rules = [
               "branchid" =>'required'
           ];
           $validate= Validator::make($request->all(), $rules);
           if($validate->fails()){
            return response()->json([$validator->errors()]);
        }else{
            $branchid=$request->branchid;
            $branchinfo= User::where('userid',$branchid)->first(); 

            if($branchinfo){
                $destination_area=array();
                 $state=$branchinfo->state;

                 $destarea= Achanprices::where('state',$state)->get();
                 foreach($destarea as $value){

                     $array1=[
                        "area"=> $value->area
                     ];
                     array_push($destination_area, $array1);
                 }

                 return response()->json($destination_area);
            }
        }
    }
    
    public function tripinfo(Request $request){
            $tripid= $request->trip_id;
            $tripinfo= Trips::where('id', $tripid)->first();
             $triparea=$tripinfo->trip_from;
             $achanbranch = achan_branch::where('airport',$triparea)->first();
             $phone_num= $achanbranch->phone_num;
             $whatapp= $achanbranch->wha_num;
             
             $tripto=$tripinfo->trip_to;

             $price = Achanprices::select('area','price')->where('area',$tripto)->first();
               
             $ext_min=$price['price'];
             $int_min=(int)$ext_min ;
             $incrementby=500;
             $ext_max= $int_min + $incrementby;
             $ext_max2=(string)$ext_max;

            return response()->json([
                 "trip_id"=> $tripinfo->id,
                 "phone_number"=>$tripinfo->passenger_phone,
                 "ticket_num"=>$tripinfo->tickets,
                 "date"=>$tripinfo->date,
                 "email"=>$tripinfo->email,
                 'passenger_name'=>$tripinfo->passenger_name,
                 "time"=>$tripinfo->time,
                 "from"=>$tripinfo->trip_from,
                 "destination"=>$tripinfo->trip_to,
                 "phone_num"=>$phone_num,
                 "whatapp"=>$whatapp,
                 "ext_main"=>$ext_max,
                 "ext_max"=>$ext_max2
             ]);
    }
}
