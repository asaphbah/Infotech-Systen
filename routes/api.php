<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
Route::post('/store',[UserController::class, 'store']);
Route::post('/auth',[UserController::class, 'auth']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/show/{id}', [UserController::class, 'show']);
});

*/