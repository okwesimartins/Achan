<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use App\Models\otp;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
class AchanmailerController extends Controller
{
    public function sendEmail(Request $request){
        $email= $request->email;
      
       
        $admin= Admin::where('email',$email)->first();
        dd($admin->name);
        
        if(empty($admin)){
           return response()->json(["status"=>"failed","message"=>"Email does not exist only admin can change password"]);
        }else{
            $title= 'Change password';
            $ademail=$admin->email;
             $airline_details=[
            'airline_name'=> $admin->name,
            'email'=> $ademail
        ];
            $otpgen= mt_rand(100000,999999);
            $str= (string)$otpgen;
            
            $otp="otp :" . $str;
            
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
}
