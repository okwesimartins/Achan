<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Branchcontroller extends Controller
{
    public function branches(){
           $branch= auth()->guard('admin-api')->user()->branches()->get();

           return response()->json($branch);
    }
}
