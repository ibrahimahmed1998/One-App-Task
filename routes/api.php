<?php
use App\Http\Controllers\AUTH_USERS\Login;
use App\Http\Controllers\AUTH_USERS\AuthController;
use App\Http\Controllers\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user(); });

Route::group(['middleware' => 'api', 'prefix' => 'auth'],function ($router){
    Route::post('login', Login::class . '@login');

    Route::post('logout', AuthController::class . '@logout');
    Route::post('refresh', AuthController::class . '@refresh');
    Route::post('me', AuthController::class . '@me');


 });

 Route::get('get_location/{user_name}', Location::class . '@get_location');
