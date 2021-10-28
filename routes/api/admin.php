<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Branchcontroller;
Route::post('admin/login',[AuthController::class, 'adminLogin']);
Route::post('admin/register',[AuthController::class, 'register']);
Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){
    // authenticated staff routes here 
     Route::post('create_branches',[AuthController::class, 'createbranch']);
     Route::get('branches',[Branchcontroller::class, 'branches']);
 });