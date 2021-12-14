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



Route::post('firstform',[Booktrips::class, 'firstbookingform']);

Route::post('secondbookingform',[Booktrips::class, 'secondbookingform']);

Route::post('thirdform',[Booktrips::class, 'thirdbookingform']);
Route::post('fourth', [Booktrips::class, 'fourthbooking']);

Route::post('tripinfo',[Booktrips::class, 'tripinfo']);

Route::post('firstestimate',[Booktrips::class, 'firstgetestimate']);
Route::post('secondestimate',[Booktrips::class, 'secondgetestimate']);
Route::post('thirdestimate',[Booktrips::class, 'thirdgetestimate']);
Route::post('fourthestimate',[Booktrips::class, 'fourthgetestimate']);



Route::post('destinationarea',[Booktrips::class, 'destinationarea']);

Route::post('drivers_info',[Drivercontroller::class, 'sellectdriver']);


Route::post('airline_branch/{admin}',[Branchcontroller::class, 'airlinebranch']);
Route::get('achan_location',[Branchcontroller::class, 'achanbranch']);
Route::post('branch/login',[AuthController::class, 'userLogin']);

Route::post('google/locations',[AuthController::class, 'getgooglelocation']);


Route::group(['prefix' => 'branch','middleware' => ['auth:user-api','scopes:user']],function(){
    
    Route::get('dashboard_api',[Branchcontroller::class, 'achandashboard']);  
    Route::get('branchcomgraph',[Graphcontroller::class, 'branchcomgraph']);  
    Route::get('branchtripcomplete',[Tripsforbranchcontroller::class, 'branchtripscomplete']); 
    Route::get('branchtrippending',[Tripsforbranchcontroller::class, 'branchpending']); 
    Route::get('branchtripcancelled',[Tripsforbranchcontroller::class, 'branchtripscancelled']); 
    Route::get('branchalltrips',[Tripsforbranchcontroller::class, 'allbranchtrips']);
    Route::post('logout',[AuthController::class, 'logout']);
    Route::get('branchgraph',[Graphcontroller::class, 'branchgraph']);    
});