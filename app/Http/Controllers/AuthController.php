<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Trips;
use App\Models\admin_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Str;                
use Validator;
class AuthController extends Controller
{
     public function register(Request $request){
         
        $rules=[
            'name' => 'required|min:3|max:50',
            'email' => 'email|unique:admins|',
            'password' => 'required|confirmed|min:6'
            // 'password_confirmation' =>'required|min:6'
         ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([$validator->errors()]);
         }else{
            $var = Str::random(32);
            Admin::create([
                 'adminid'=>$var,
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'password'=>Hash::make($request->password),
                
            ]);
            return response()->json(["status"=>"success","message"=>"user created"]);
         }
     }
     public function adminLogin(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         if($validator->fails()){
             return response()->json(['error' => $validator->errors()->all()]);
         }
 
         if(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){
 
             config(['auth.guards.api.provider' => 'admin']);
             
             $admin =auth()->guard('admin')->user();//Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
             $success =  $admin;
             $success['token'] =  $admin->createToken('MyApp',['admin'])->accessToken; 
 
             return response()->json($success, 200);
         }else{ 
             return response()->json(['error' => ['Email and Password are Wrong.']], 200);
         }
     }
     






     public function userLogin(Request $request)
     {
         if($request->branchid){
             $branch_id = $request->branchid;
             $user= User::where('userid',$branch_id)->first();
             
             if($user){
                if(auth()->guard('user')->loginUsingId($user->id)){
                    $admin =auth()->guard('user')->user();

                    
                    $success =  $admin;
                    $success['token'] =  $admin->createToken('MyApp',['user'])->accessToken;

                    return response()->json($success, 200);
                }
             }else{
                 return response()->json(["status"=>"failed","message"=>"branchid does not exist"]);
             }
            
             
         }else{
            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->all()]);
            }
    
            if(auth()->guard('user')->attempt(['branchemail' => request('email'), 'password' => request('password')])){
    
                config(['auth.guards.api.provider' => 'user']);
                
                $admin =auth()->guard('user')->user();//Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
                $success =  $admin;
                $success['token'] =  $admin->createToken('MyApp',['user'])->accessToken; 
    
                return response()->json($success, 200);
            
               }
               else{ 
                return response()->json(['error' => ['Email and Password are Wrong.']], 200);
            }
         }
        
     }
    
     public function createbranch(Request $request){
            $rules=[
           
            'branchemail' => 'email|unique:users|',
            'password' => 'required|confirmed|min:6'
            
              ];

         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json($validator->errors());
         }
         
         else{
             
            $var = Str::random(32);
            $id= auth()->guard('admin-api')->user()->id;
           
            
           $createuser= User::create([
               
                'branchemail'=>$request->branchemail,
                'password'=>Hash::make($request->password),
                'branch_location'=>$request->location,
                'userid'=> $var
          ]);
           admin_user::create([
                 'user_id'=> $createuser->id,
                 'admin_id'=>$id
           ]);
          return response()->json(["status"=>"success","message"=>"user created"]);
         }
              
        //id_rsa =*=*c!uZTgRd%O8cQR

     }

     public function dashboardapi(){
        
        $branch = auth()->guard('admin-api')->user()->branches()->get();
        $array1=array();
        foreach ($branch as  $value) {
               $userid= $value->userid;
               $tripcheck = Trips::where('airline_branch_id',$userid)->get();
               if($tripcheck){
               $totalrev = Trips::where('airline_branch_id',$userid)->sum('total');
               $totalbooking = Trips::where('airline_branch_id',$userid)->count();
               
               $total_in_int=(int)$totalrev;
               $commission = $total_in_int * 0.1 ;
               
               
               $array2 = [
                      "userid"=>$value->userid,
                      "location"=>$value->branch_location,
                      "branchemail"=>$value->branchemail,
                      "totalrev"=>$total_in_int,
                      "commission"=>$commission,
                      "totalbooking"=> $totalbooking ,
                      "totalpassenger"=> $totalbooking 

               ];
               
               array_push($array1,$array2);
              

            }else{
                $totalbooking = Trips::where('airline_branch_id',$userid)->count();
                $array2 = [
                    "userid"=>$value->userid,
                    "location"=>$value->branch_location,
                    "branchemail"=>$value->branchemail,
                    "totalrev"=>"0",
                    "commission"=>"0",
                    "totalbooking"=> $totalbooking ,
                    "totalpassenger"=> $totalbooking 

             ];
             
             array_push($array1,$array2);
            }
               
        }

        $sumrev = 0;
        $sumcom = 0;
        $bookings =0;
        $passenger=0;
        foreach($array1 as $value){
       
        if(isset($value['totalrev'])){
            $num= $value['totalrev'];
           
          
            $sumrev +=  $num;
        }  
        if(isset($value['commission'])){
            $sumcom += $value['commission'];
        }
        if(isset($value['totalbooking'])){
            $bookings += $value['totalbooking'];
        }
        if(isset($value['totalpassenger'])){
            $passenger += $value['totalpassenger'];
        }
       
       
        }
        $admin= Auth::guard('admin-api')->user();
     
        return response()->json([
            "name"=>$admin['name'],
            "email"=>$admin['email'],
            "adminid"=>$admin['adminid'],
            "total_rev"=>$sumrev,
            "total_com"=> $sumcom,
            "bookings"=>  $bookings,
            "passenger"=>  $passenger


        ]);
     }

}
