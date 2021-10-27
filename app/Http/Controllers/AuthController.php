<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Str;                
use Validator;
class AuthController extends Controller
{
     public function register(Request $request){
        $rules=[
            'name' => 'required|unique:admin|min:3|max:50',
            'email' => 'email|unique:admin|',
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
             
             $admin = Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
             $success =  $admin;
             $success['token'] =  $admin->createToken('MyApp',['admin'])->accessToken; 
 
             return response()->json($success, 200);
         }else{ 
             return response()->json(['error' => ['Email and Password are Wrong.']], 200);
         }
     }

     public function createbranch(Request $request){
            
            $rules=[
            'branchname' => 'required|min:3|max:50',
            'branchemail' => 'email|unique:users',
            'password' => 'required|confirmed|min:6'
            
              ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([$validator->errors()]);
         }else{
            $var = Str::random(32);

            User::create([
                'branchname'=>$request->branchname,
                'branchemail'=>$request->branchemail,
                'password'=>$request->password,
                'branch_location'=>$request->location,
                'userid'=> $var
          ]);

          return response()->json(["status"=>"success","message"=>"user created"]);
         }
              


     }

}
