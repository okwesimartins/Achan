<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
                  $ticket_link=[
                      'link1'=>$link1,
                      'link2'=>$link2,
                      'link3'=>$link3,
                      'link4'=>$link4
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
                $ticket_link=[
                    'link1'=>$link1,
                    'link2'=>$link2,
                    
                    
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
