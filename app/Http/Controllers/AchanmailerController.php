<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use App\Models\Trips;

use App\Models\otp;
use App\Mail\SendMail;
use App\Mail\Ticketmail;
use Illuminate\Support\Facades\Mail;
class AchanmailerController extends Controller
{
    public function sendEmail(Request $request){
    
        $email= $request->email;
      
       
        $admin= Admin::where('email',$email)->first();
        
        
        if(empty($admin)){
           return response()->json([
               "status"=>"failed"
           ]);
        }else{

            $title= 'Change password';
            $ademail=$admin->email;

             $airline_details=[
            "airline_name"=> $admin->name,
            "email"=> $ademail
            ];
       
            $otpgen= mt_rand(1000,9999);
            $str= (string)$otpgen;
            
            $otp=[
                "otp"=>$str,
            ];
            
           $sendmail= Mail::to( $airline_details['email'])->send(new SendMail($title,$airline_details,$otp));

           if(empty($sendmail)){
               $admincheck = otp::where('email',$ademail)->first();
               if($admincheck){
                   $otpupdate = otp::where('email',$ademail)->update(['otpcode'=>$otpgen]);
               }else{
                  $otpupdate = otp::where('email',$ademail)->create(['email'=>$ademail,'otpcode'=>$otpgen]);
               }
               return response()->json([
                  "status"=>"success",
                  "message"=>"email sent"
               ]);
           }else{
            return response()->json([
                "status"=>"failed",
                "message"=>"email not sent, try agaian"
             ]);
           }
        }
       
    }

    public function sendTicketmail(Request $request){
              $link1= $request->link1;
              $link2= $request->link2;

              $link3= $request->link3;
              $link4= $request->link4;
              $email=$request->email;
              $name=$request->name;

              if($link1 && $link2 && $link3 && $link4){
                  $title = 'Ticket';
                  $user_details= [
                      'email'=>$email,
                      'name'=>$name
                  ];
                  $url1= parse_url($link1);
                  parse_str($url1['query'],$params);
                  $link_id1=$params['trip_id'];
                  $tripid1=Trips::Where('trip_id',$link_id1)->first();
                  
                  $url2= parse_url($link2);
                  parse_str($url2['query'],$params2);
                  $link_id2=$params2['trip_id'];
                  $tripid2=Trips::Where('trip_id',$link_id2)->first();
                  
                  $url3= parse_url($link3);
                  parse_str($url3['query'],$params3);
                  $link_id3=$params3['trip_id'];
                  $tripid3=Trips::Where('trip_id',$link_id3)->first();
                  
                  $url4= parse_url($link4);
                  parse_str($url4['query'],$params4);
                  $link_id4=$params4['trip_id'];
                  $tripid4=Trips::Where('trip_id',$link_id4)->first();

                  $ticket_link=[
                      'link1'=>$link1,
                      'link1_from'=>$tripid1->trip_from,
                      'link1_to'=>$tripid1->trip_to,

                      'link2'=>$link2,
                      'link2_from'=>$tripid2->trip_from,
                      'link2_to'=>$tripid2->trip_to,

                      'link3'=>$link3,
                      'link3_from'=>$tripid3->trip_from,
                      'link3_to'=>$tripid3->trip_to,

                      'link4'=>$link4,
                      'link4_from'=>$tripid4->trip_from,
                      'link4_to'=>$tripid4->trip_to,
                  ];


                  $sendmail= Mail::to( $user_details['email'])->send(new Ticketmail($title,$user_details,$ticket_link));

                  if(empty($sendmail)){
                         return response()->json([
                             "status"=>"success",
                             "message"=>"Email Sent"
                         ]);
                  }

              }else{
                $title = 'Ticket';
                $user_details= [
                    'email'=>$email,
                    'name'=>$name
                ];

                $url1= parse_url($link1);
                parse_str($url1['query'],$params);
                $link_id1=$params['trip_id'];

                
                $tripid1=Trips::Where('trip_id',$link_id1)->first();
                
                $url2= parse_url($link2);
                parse_str($url2['query'],$params2);
                $link_id2=$params2['trip_id'];
                $tripid2=Trips::Where('trip_id',$link_id2)->first();

                dd($tripid1);
                $ticket_link=[
                    'link1'=>$link1,
                      'link1_from'=>$tripid1->trip_from,
                      'link1_to'=>$tripid1->trip_to,

                      'link2'=>$link2,
                      'link2_from'=>$tripid2->trip_from,
                      'link2_to'=>$tripid2->trip_to,
                    
                ];
                $sendmail= Mail::to( $user_details['email'])->send(new Ticketmail($title,$user_details,$ticket_link));

                if(empty($sendmail)){
                       return response()->json([
                           "status"=>"success",
                           "message"=>"Email Sent"
                       ]);
                }
              }


              
    }
}
