<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Trips;
use App\Models\admin_user;
use App\Models\achan_branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Str;                
use Validator;
use Carbon\Carbon;
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
            'password' => 'required|confirmed|min:6',
            'location' => 'required'
              ];

         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json($validator->errors());
         }
         
         else{
             
            $var = Str::random(32);
            $id= auth()->guard('admin-api')->user()->id;
            $location= $request->location;
            $state= achan_branch::where('airport',$location)->first();
            
            $createuser= User::create([
                'branchemail'=>$request->branchemail,
                'password'=>Hash::make($request->password),
                'branch_location'=>$location,
                'userid'=> $var,
                'state'=>$state['state']
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

        $carbondate=Carbon::now();
        $day= $carbondate->day;

        foreach ($branch as  $value) {
               $userid= $value->userid;
               $tripcheck = Trips::where('airline_branch_id',$userid)->where('day', $day)->get();
               if($tripcheck){
               $totalrev = Trips::where('airline_branch_id',$userid)->where('day', $day)->get()->sum('total');
               $totalbooking = Trips::where('airline_branch_id',$userid)->where('day', $day)->count();
               
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


     //admin update pssword
     public function updateadminpass(Request $request){
         
        $rules=[
        
            'password' => 'required|confirmed|min:6'
            // 'password_confirmation' =>'required|min:6'
         ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([$validator->errors()]);
         }else{
            $email= $request->email;
           
            Admin::where('email', $email)->update([
               
                 'password'=>Hash::make($request->password),
                
            ]);
            return response()->json(["status"=>"success","message"=>"updated"]);
         }
     }

     //admin update branch password


     public function updatebranchpass(Request $request){
         
        $rules=[
        
            'password' => 'required|confirmed|min:6'
            // 'password_confirmation' =>'required|min:6'
         ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([$validator->errors()]);
         }else{
            $branchid= $request->branchid;
           User::where('userid',$branchid)->update([
               
                 'password'=>Hash::make($request->password),
                
            ]);
            return response()->json(["status"=>"success","message"=>"updated"]);
         }
     }


     public function adminupdate(Request $request){
          
        $email= $request->email;
        $name= $request->name;
        $adminid= $request->adminid;
        $rules=[
            'name' => 'required',
            'email' => 'email|unique:admins|',
            'adminid'=> 'required'
            
            // 'password_confirmation' =>'required|min:6'
         ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([$validator->errors()]);
         }
          else{
          
           $branchinfo= Admin::where('adminid',$adminid)->update([
                 "name"=>$name,
                 "email"=> $email,
           ]);  
   
           return response()->json([
               
              "status"=>"success"
   
           ]);
          }
     
   }


   public function  getgooglelocation(Request $request){
             
             $area= $request->area;


             $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://maps.googleapis.com/maps/api/place/autocomplete/json?input=Toyin&key=AIzaSyAN4lc1-JLSGrY97rGNQ9RpiQAoq3KuRbg',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
return response()->json([$response]);
   }



   public function logout(Request $request){
          $token= $request->user()->token();
          $token->revoke();

          return response()->json([
               "message"=>"success",
          ]);
   }

}
