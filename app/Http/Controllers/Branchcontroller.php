<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\achan_branch;
class Branchcontroller extends Controller
{
    public function branches(){
           $branch= auth()->guard('admin-api')->user()->branches()->get();

           return response()->json($branch);
    }
    public function createdbranch(){

        $branch= achan_branch::select('uid','title','airport','state','phone_num','wha_num','name','email','phone','password','slot_count')->get();
        return response()->json($branch);
 }
}
