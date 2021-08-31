<?php

use App\Http\Controllers\AUTH_USERS\Add_user;
use App\Http\Middleware\type_admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Location;

Route::group([ 'middleware' => type_admin::class ],function ($router){

    Route::post('add_user', Add_user::class . '@add_user')->middleware(type_admin::class);
    Route::post('add_location',Location::class.'@add_location');

    });



