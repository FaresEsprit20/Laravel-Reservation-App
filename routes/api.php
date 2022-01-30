<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocatairesController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SeancesController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    
    Route::get('/groupesjson', [GroupesController::class,'indexJson'])->middleware('jwt.verify');
   
    
    
 

});









