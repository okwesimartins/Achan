<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('achan_location',[AuthController::class, 'userLogin']);
Route::post('branch/login',[AuthController::class, 'userLogin']);