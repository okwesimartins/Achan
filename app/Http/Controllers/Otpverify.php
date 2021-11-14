<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\otp;
class Otpverify extends Controller
{   

   
    public function verifyotp(Request $request){
           $email=$request->email;
           $otp=$request->otp;
           if($email && $otp){
               $otv=otp::where('email',$email)->first();
               if($otv){
                   $otp1= $otv->otpcode;
                   if( $otp == $otp1){
                       return response()->json([
                           "status"=>"success"
                       ]);
                   }else{
                      return response()->json([
                        "status"=>"failed"
                      ]);
                   }
               }
           }

    } 
}
