<?php

use App\Http\Controllers\ElevesController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfesseursController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\SuitesVidesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class,'index'])->name('login.index');

Route::post('/login', [LoginController::class,'loginSubmit'])->name('login.submit');

Route::get('/home', [HomeController::class,'index'])->name('home.index');

Route::get('/reservations', [ReservationsController::class,'index'])->name('reservations.index');

Route::get('/eleves', [ElevesController::class,'index'])->name('eleves.index');

Route::get('/factures', [FacturesController::class,'index'])->name('factures.index');

Route::get('/groupes', [GroupesController::class,'index'])->name('groupes.index');

Route::get('/locations', [LocationsController::class,'index'])->name('locations.index');

Route::get('/professeurs', [ProfesseursController::class,'index'])->name('professeurs.index');

Route::get('/seances', [SeancesController::class,'index'])->name('seances.index');

Route::get('/suitesvides', [SuitesVidesController::class,'index'])->name('suitesvides.index');





