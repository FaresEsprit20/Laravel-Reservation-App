<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/reservations/{id?}',function($id = null){
    return 'Hi Reservations id =  '. $id;
 })->where('id','[0-9]+');
 //->where('id','[a-zA-Z]+');

 Route::match(['POST','GET'],'/groups',function(Request $request){
  return 'Request Method is   '. $request->method();
 });


