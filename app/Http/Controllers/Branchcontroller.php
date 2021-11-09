<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\achan_branch;
use App\Models\User;
use App\Models\Admin;
use App\Models\Trips;
class Branchcontroller extends Controller
{
    public function branches(){
           $branch = auth()->guard('admin-api')->user()->branches()->get();
           if($branch){
              $array1=array();

              dd($branch);
              foreach ($branch as  $value) {
                     $userid= $value->userid;
   
                     $totalrev = Trips::where('airline_branch_id',$userid)->sum('total');
   
                     $total_in_int=(int)$totalrev;
                     $commission = $total_in_int * 0.1 ;
                     
                     
                     $array2 = [
                            "userid"=>$value->userid,
                            "location"=>$value->branch_location,
                            "branchemail"=>$value->branchemail,
                            "totalrev"=>$total_in_int,
                            "commission"=>$commission
   
                     ];
                     
                     array_push($array1,$array2);
                    
   
                     
                     
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

        $totalrev= Trips::where('airline_branch_id', $branchid)->sum('total');
        $totalbooking= Trips::where('airline_branch_id', $branchid)->count();
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
 }
}
