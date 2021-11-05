<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\achan_branch;
use App\Models\User;
use App\Models\Admin;
class Branchcontroller extends Controller
{
    public function branches(){
           $branch= auth()->guard('admin-api')->user()->branches()->get();

           return response()->json($branch);
    }
    public function achanbranch(){

        $branch= achan_branch::select('uid','title','airport','state','phone_num')->get();
        return response()->json($branch);
 }

 public function airlinebranch(Admin $admin){
      
        // $admin = Admin::select('id','name','email','password','adminid')->where('adminid',$adminid)->first();

        $adminbranch=$admin->branches()->get();
        return response()->json($adminbranch);



 }
}
