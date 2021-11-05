<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Branchcontroller;
use App\Http\Controllers\Booktrips;
Route::post('booktrip',[Booktrips::class, 'booktrip']);

Route::post('estimate',[Booktrips::class, 'getestimate']);


Route::post('airline_branch/{admin}',[Branchcontroller::class, 'airlinebranch']);
Route::get('achan_location',[Branchcontroller::class, 'achanbranch']);
Route::post('branch/login',[AuthController::class, 'userLogin']);