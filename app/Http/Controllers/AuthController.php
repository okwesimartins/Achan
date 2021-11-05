<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
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
         }else{ 
             return response()->json(['error' => ['Email and Password are Wrong.']], 200);
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

}
