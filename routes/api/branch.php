<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Branchcontroller;
use App\Http\Controllers\Booktrips;
use App\Http\Controllers\Graphcontroller;
use App\Http\Controllers\Tripsforbranchcontroller;
use App\Http\Controllers\Drivercontroller;


Route::post('booktrip',[Booktrips::class, 'booktrip']);


Route::post('tripinfo',[Booktrips::class, 'tripinfo']);

Route::post('estimate',[Booktrips::class, 'getestimate']);
Route::post('destinationarea',[Booktrips::class, 'destinationarea']);

Route::post('drivers_info',[Drivercontroller::class, 'sellectdriver']);


Route::post('airline_branch/{admin}',[Branchcontroller::class, 'airlinebranch']);
Route::get('achan_location',[Branchcontroller::class, 'achanbranch']);
Route::post('branch/login',[AuthController::class, 'userLogin']);

Route::group(['prefix' => 'branch','middleware' => ['auth:user-api','scopes:user']],function(){
    
    Route::get('dashboard_api',[Branchcontroller::class, 'achandashboard']);  
    Route::get('branchcomgraph',[Graphcontroller::class, 'branchcomgraph']);  
    Route::get('branchtripcomplete',[Tripsforbranchcontroller::class, 'branchtripscomplete']); 
    Route::get('branchtrippending',[Tripsforbranchcontroller::class, 'branchpending']); 
    Route::get('branchtripcancelled',[Tripsforbranchcontroller::class, 'branchtripscancelled']); 
    Route::get('branchalltrips',[Tripsforbranchcontroller::class, 'allbranchtrips']);
    Route::post('branch/logout',[AuthController::class, 'logout']);
    Route::get('branchgraph',[Graphcontroller::class, 'branchgraph']);    
});