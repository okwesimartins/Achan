<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Branchcontroller;
use App\Http\Controllers\Graphcontroller;

use App\Http\Controllers\Tripscontroller;
use App\Http\Controllers\AchanmailerController;
Route::post('admin/login',[AuthController::class, 'adminLogin']);
Route::post('admin/register',[AuthController::class, 'register']);

Route::post('passwordupdate',[AchanmailerController::class, 'sendEmail']);
Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){
    // authenticated admin routes here 
     Route::get('admin_graph',[Graphcontroller::class, 'graph']);
     Route::get('dashboardapi',[AuthController::class, 'dashboardapi']);
     Route::get('all_trips',[Tripscontroller::class, 'admintrips']);

     Route::get('admincompleted',[Tripscontroller::class, 'admincompletedtrip']);

     Route::get('adminpending',[Tripscontroller::class, 'adminpendingtrip']);

     Route::get('admincancelled',[Tripscontroller::class, 'cancelledtrips']);

     Route::post('create_branches',[AuthController::class, 'createbranch']);

     Route::get('admingraphcom',[Graphcontroller::class, 'admincomgraph']);  
     Route::get('branches',[Branchcontroller::class, 'branches']);
 });