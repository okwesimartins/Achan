<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\achan_branch;
use App\Models\User;
use App\Models\Admin;
use App\Models\Trips;
use Carbon\Carbon;
use Validator;
class Branchcontroller extends Controller
{
    public function branches(){
           $branch = auth()->guard('admin-api')->user()->branches()->get();
           if($branch){
              $array1=array();

              $carbondate=Carbon::now();
              $day= $carbondate->day;
              foreach ($branch as  $value) {
                     $userid= $value->userid;
                     $tripcheck = Trips::where('airline_branch_id',$userid)->where('day',$day)->get();
                     if($tripcheck){

                            
                            $totalrev = Trips::where('airline_branch_id',$userid)->where('day',$day)->get()->sum('total');
                           
                            
                            $total_in_int=(int)$totalrev;
                            $commission = $total_in_int * 0.1;
                           
                            
                            
                            
                            
                            $array2 = [
                                   "userid"=>$value->userid,
                                   "location"=>$value->branch_location,
                                   "branchemail"=>$value->branchemail,
                                   "totalrev"=>$totalrev,
                                   "commission"=>$commission
          
                            ];
                            
                            array_push($array1,$array2);
                     }else{
                            $array2 = [
                                   "userid"=>$value->userid,
                                   "location"=>$value->branch_location,
                                   "branchemail"=>$value->branchemail,
                                   "totalrev"=>"0",
                                   "commission"=>"0"
          
                            ];


                            array_push($array1,$array2);
                     }
                           
                     
                 
                    
   
                     
                     
              }
             
   
              return response()->json($array1);
           }else{
              return response()->json(["status"=>"failed","message"=>"Branches yet"]); 
           }
       
    }
    public function achanbranch(){

        $branch= achan_branch::get();
        return response()->json($branch);
 }

 public function airlinebranch(Admin $admin){
      
        // $admin = Admin::select('id','name','email','password','adminid')->where('adminid',$adminid)->first();

        $adminbranch=$admin->branches()->get();
        return response()->json($adminbranch);



 }
 public function achandashboard(){
        $branch = auth()->guard('user-api')->user();
        $branchid = $branch->userid;
        $carbondate=Carbon::now();
        $day= $carbondate->day;
        $totalrev= Trips::where('airline_branch_id', $branchid)->where('day',$day)->get()->sum('total');
        if($totalrev){
              $totalbooking= Trips::where('airline_branch_id', $branchid)->where('day',$day)->count();
              $total_in_int=(int)$totalrev;
              $commission = $total_in_int * 0.1 ;
      
              return response()->json([
                      "branchemail" => $branch->branchemail,
                      "branch_location"=> $branch->branch_location,
                      "userid"=> $branch->userid,
                      "total"=> $total_in_int,
                      "commission"=> $commission,
                      "totalbooking"=> $totalbooking,
                      "totalpassengers"=>$totalbooking
              ]);
        }else{
              $totalbooking= Trips::where('airline_branch_id', $branchid)->where('day',$day)->count();
            
      
              return response()->json([
                      "branchemail" => $branch->branchemail,
                      "branch_location"=> $branch->branch_location,
                      "userid"=> $branch->userid,
                      "total"=> $total_in_int,
                      "commission"=> "0",
                      "totalbooking"=> $totalbooking,
                      "totalpassengers"=>$totalbooking
              ]);
        }
    
 }
       
    public function branchdetails(Request $request){
          
             $rules=[
             
              'branchid' => 'required',
              
              // 'password_confirmation' =>'required|min:6'
           ];
           $validator = Validator::make($request->all(),$rules);
           if($validator->fails()){
               return response()->json([$validator->errors()]);
           }
             else{
              $branchid= $request->branchid;
              $branchinfo= User::where('userid',$branchid)->first();  

              return response()->json([
                     "branchemail"=>$branchinfo->branchemail,
                     "branch_location"=>$branchinfo->branch_location


              ]);
             }
            


    }
}
