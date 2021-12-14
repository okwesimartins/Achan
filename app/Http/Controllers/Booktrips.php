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
        
        $estimated_arivaltime= $request->estimated_arivaltime;
        
        $from = $user->branch_location;
        $achanbranchloca = achan_branch::where('airport',$from)->first();
        $phone_num= $achanbranchloca->phone_num;
        $whatapp= $achanbranchloca->wha_num;


        $driver= driver::inRandomOrder()->first();
        $driver_id= $driver->driver_id;
        
        $pickupaddress=$request->pickupaddress;
        $secondfrom = $request->pickup_area;
        $depatureairport_id=$request->depature_airid;
        $depatureairport = User::where('userid',$depatureairport_id)->first();
        $airport_state= $depatureairport->state;
        $secondto =  $depatureairport->branch_location;
        $secondrandom = mt_rand(100000, 999999);
        $secondtripid = "ach".$secondrandom;
        $estmin2=$request->estmin2;
        $estmax2= $request->estmax2;

        $achanbranch2 = achan_branch::where('airport', $secondto)->first();
        $phone_num2= $achanbranch2->phone_num;
        $whatapp2=  $achanbranch2->wha_num;
       //first booking
   
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
            'est_min'=>$estmin2,
            'est_max'=>$estmax2,
            'pay_status'=>"pending",
            'tickets'=>$ticket,
            'airline_branch_id'=>$airlineid,
            'pickup_address'=>  $pickupaddress
     ]);



 //second booking
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
        'time'=>$estimated_arivaltime,
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
         ],
         "second_ticket"=>[
            "trip_id"=> $create_trip->id,
            "phone_number"=>$create_trip->passenger_phone,
            "ticket_num"=>$create_trip->tickets,
            "email"=>$create_trip->email,
            'passenger_name'=>$create_trip->passenger_name,
           
            "date"=>$create_trip->date,
            "time"=>$create_trip->time,
            "from"=>$create_trip->trip_from,
            "destination"=>$create_trip->trip_to,
            "phone_num"=>$phone_num2,
            "whatapp"=>$whatapp2
         ]
        
     ]);

    }





    public function fourthbooking(Request $request){
            
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
        
        $returndate = $request->returndate;
        $returntime = $request->returntime;
        
        
        $estimated_arivaltime= $request->estimated_arivaltime;
        $estimated_returnarivaltime = $request->estimated_returnarivaltime;

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
        $depatureairport_id=$request->depature_airid;
        $depatureairport = User::where('userid',$depatureairport_id)->first();
        $airport_state= $depatureairport->state;
        $secondto =  $depatureairport->branch_location;
        $secondrandom = mt_rand(100000, 999999);
        $secondtripid = "ach".$secondrandom;
        $estmin2=$request->estmin2;
        $estmax2= $request->estmax2;

        $achanbranch2 = achan_branch::where('airport', $secondto)->first();
        $phone_num2= $achanbranch2->phone_num;
        $whatapp2=  $achanbranch2->wha_num;
       //first booking
   
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
            'est_min'=>$estmin2,
            'est_max'=>$estmax2,
            'pay_status'=>"pending",
            'tickets'=>$ticket,
            'airline_branch_id'=>$secondtripid,
            'pickup_address'=>  $pickupaddress
     ]);



 //second booking
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
        'time'=>$estimated_arivaltime,
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

 //third booking

 $create_trip3= Trips::create([
    'trip_from'=>$to,
    'trip_to'=>$from,
    'trip_type'=>"Local",
    'passenger_name'=>$firstname,
    'email'=>$email,
    'surname'=>$surname,
    'passenger_phone'=>$phonenumber,
    'driver_id'=>$driver_id,
    'trip_id'=> $secondtripid,
    'date'=>$returndate,
    'time'=>$returntime,
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
    'pickup_address'=>  $destarea
]);


//forth booking

$create_trip4= Trips::create([
    'trip_from'=>$secondto,
    'trip_to'=>$secondfrom,
    'trip_type'=>"Local",
    'passenger_name'=>$firstname,
    'email'=>$email,
    'surname'=>$surname,
    'passenger_phone'=>$phonenumber,
    'driver_id'=>$driver_id,
    'trip_id'=> $tripid,
    'date'=>$returndate,
    'time'=>$estimated_returnarivaltime,
    'booking_date'=>$bookingdate,
    'booking_time'=>$bookingtime,
    'status'=>"pending",
    'day'=>$day,
    'month'=>$month,
    'year'=>$year,
    'dest_area'=>$destarea,
    'state'=>$state,
    'est_min'=>$estmin2,
    'est_max'=>$estmax2,
    'pay_status'=>"pending",
    'tickets'=>$ticket,
    'airline_branch_id'=>$secondtripid
]);


     return response()->json([
        "first_ticket"=>[   
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
         ],
         "second_ticket"=>[
            "trip_id"=> $create_trip->id,
            "phone_number"=>$create_trip->passenger_phone,
            "ticket_num"=>$create_trip->tickets,
            "email"=>$create_trip->email,
            'passenger_name'=>$create_trip->passenger_name,
           
            "date"=>$create_trip->date,
            "time"=>$create_trip->time,
            "from"=>$create_trip->trip_from,
            "destination"=>$create_trip->trip_to,
            "phone_num"=>$phone_num2,
            "whatapp"=>$whatapp2
         ],
         "third_ticket"=>[
            "trip_id"=> $create_trip3->id,
            "phone_number"=>$create_trip3->passenger_phone,
            "ticket_num"=>$create_trip3->tickets,
            "email"=>$create_trip3->email,
            'passenger_name'=>$create_trip3->passenger_name,
           
            "date"=>$create_trip3->date,
            "time"=>$create_trip3->time,
            "from"=>$create_trip3->trip_from,
            "destination"=>$create_trip3->trip_to,
            "phone_num"=>$phone_num2,
            "whatapp"=>$whatapp2
         ],
         "forth_ticket"=>[
            "trip_id"=> $create_trip4->id,
            "phone_number"=>$create_trip4->passenger_phone,
            "ticket_num"=>$create_trip4->tickets,
            "email"=>$create_trip4->email,
            'passenger_name'=>$create_trip4->passenger_name,
            
            "date"=>$create_trip4->date,
            "time"=>$create_trip4->time,
            "from"=>$create_trip4->trip_from,
            "destination"=>$create_trip4->trip_to,
            "phone_num"=>$phone_num,
            "whatapp"=>$whatapp
         ]
        
     ]);

    }
  

//for the first form
  public function firstgetestimate(Request $request){
        
         $pickuparea= $request->pickup_area;
         $airlineid= $request->airid;
         $date= $request->date;
         $time = $request->time;
         $user = User::where('userid',$airlineid)->first();
         $to = $user->branch_location;

         $price = Achanprices::select('area','price')->where('area',$pickuparea )->first();
               
         $ext_min=$price['price'];
         $int_min=(int)$ext_min ;
         $incrementby=500;
         $ext_max= $int_min + $incrementby;
         
         return response()->json([
                    "from"=> $pickuparea,
                    "to"=>  $to,
                    "date"=>$date,
                    "time"=>$time,
                    "est_min"=>$ext_min,
                    "est_max"=>$ext_max
         ]);
  }

//for the second form
  public function secondgetestimate(Request $request){
         

    $destination = $request->destination_area;

    $fromid = $request->airid;
    $destination_address= $request->dest_address;
    $date = $request->date;
     $time = $request->time;

     $returndate = $request->returndate;
     $returntime = $request->returntime;
     $user = User::where('userid',$fromid)->first();
     $from = $user->branch_location;
    


     $price = Achanprices::select('area','price')->where('area',$destination )->first();
               
     $ext_min=$price['price'];
     $int_min=(int)$ext_min ;
     $incrementby=500;
     $ext_max= $int_min + $incrementby;
    
     return response()->json([
                "from"=> $from,
                "to"=>  $destination,
                "date"=>$date,
                "time"=>$time,
                "est_min"=>$ext_min,
                "est_max"=>$ext_max
            ]);

  }



  public function thirdgetestimate(Request $request){
    $pickuparea = $request->pickup_area;

    $arrivalid = $request->arrival_airid;

    $departureid = $request->departure_airid;

    $destination_aarea= $request->destination_area;
    $date = $request->date;
     $time = $request->time;

     $returndate = $request->returndate;
     $returntime = $request->returntime;
     $arrival = User::where('userid',$arrivalid )->first();

     $departure = User::where('userid',$departureid )->first();
     $from = $arrival->branch_location;
     $to =  $departure->branch_location;


     $price = Achanprices::select('area','price')->where('area',$destination_aarea )->first();

     $ext_min=$price['price'];
     $int_min=(int)$ext_min ;
     $incrementby=500;
     $ext_max= $int_min + $incrementby;
   


     $price2 = Achanprices::select('area','price')->where('area', $pickuparea )->first();
     $ext_min2=$price2['price'];
     $int_min2=(int)$ext_min2 ;
     $incrementby2=500;
     $ext_max2= $int_min2 + $incrementby2;
   

     return response()->json([
        "first_cost"=>[
            "from"=>  $pickuparea,
            "to"=>  $to,
            "date"=>$date,
            "time"=>$time,
            "est_min"=>$ext_min2,
            "est_max"=>$ext_max2
        ],
        "second_cost"=>[
         "from"=> $from,
         "to"=>  $destination_aarea,
         "date"=>$date,
         "time"=>$time,
         "est_min"=>$ext_min,
         "est_max"=>$ext_max
     ]
 ]);
               
  }




  public function fourthgetestimate(Request $request){
    $pickuparea = $request->pickup_area;

    $arrivalid = $request->arrival_airid;

    $departureid = $request->departure_airid;

    $destination_aarea= $request->destination_area;
    $date = $request->date;
     $time = $request->time;

     $returndate = $request->returndate;
     $returntime = $request->returntime;
     $arrival = User::where('userid',$arrivalid )->first();

     $departure = User::where('userid',$departureid )->first();
     $from = $arrival->branch_location;
     $to =  $departure->branch_location;


     $price = Achanprices::select('area','price')->where('area',$destination_aarea )->first();

     $ext_min=$price['price'];
     $int_min=(int)$ext_min ;
     $incrementby=500;
     $ext_max= $int_min + $incrementby;
    


     $price2 = Achanprices::select('area','price')->where('area', $pickuparea )->first();
     $ext_min2=$price2['price'];
     $int_min2=(int)$ext_min2 ;
     $incrementby2=500;
     $ext_max2= $int_min2 + $incrementby2;
   

     return response()->json([
        "first_cost"=>[
            "from"=>  $pickuparea,
            "to"=>  $to,
            "date"=>$date,
            "time"=>$time,
            "est_min"=>$ext_min2,
            "est_max"=>$ext_max2
        ],
        "second_cost"=>[
         "from"=> $from,
         "to"=>  $destination_aarea,
         "date"=>$date,
         "time"=>$time,
         "est_min"=>$ext_min,
         "est_max"=>$ext_max
        ],
        "third_cost"=>[
            "from"=>  $destination_aarea,
            "to"=>  $from,
            "date"=>$date,
            "time"=>$time,
            "est_min"=>$ext_min,
            "est_max"=>$ext_max
        ],
        "fourth_cost"=>[
         "from"=>  $to,
         "to"=> $pickuparea,
         "date"=>$date,
         "time"=>$time,
         "est_min"=>$ext_min2,
         "est_max"=>$ext_max2
     ]
 ]);
               
  }




















    public function getestimate(Request $request){
           
           $destination = $request->destination;
           
           $depature_airid = $request->departure_airid;
           $arrival_airid = $request->arrival_airid;


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
