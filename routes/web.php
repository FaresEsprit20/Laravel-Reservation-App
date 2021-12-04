<?php

use App\Http\Controllers\ElevesController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocatairesController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SeancesController;
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
Route::post('/eleves/create', [ElevesController::class,'CreateEleve'])->name('create.eleve');
Route::post('/eleves/findGroups', [ElevesController::class,'findEleveGroups'])->name('find.eleve.groups');
Route::put('/eleves/update', [ElevesController::class,'UpdateEleve'])->name('update.eleve');

Route::get('/factures', [FacturesController::class,'index'])->name('factures.index');

Route::get('/groupes', [GroupesController::class,'index'])->name('groupes.index');
Route::post('/groupes/create', [GroupesController::class,'CreateGroup'])->name('create.group');
Route::put('/groupes/update', [GroupesController::class,'UpdateGroup'])->name('update.group');

Route::get('/locations', [LocationsController::class,'index'])->name('locations.index');
Route::post('/locations/create', [LocationsController::class,'CreateLocation'])->name('create.location');
Route::put('/locations/update', [LocationsController::class,'UpdateLocation'])->name('update.location');
Route::get('/locations/suitesvides', [LocationsController::class,'suitesvidesView'])->name('suitesvides.list');
Route::post('/locations/suitesvides/list', [LocationsController::class,'getSuitesVides'])->name('suitesvides.list.get');

Route::get('/professeurs', [LocatairesController::class,'professeursView'])->name('professeurs.index');
Route::post('/professeurs/create', [LocatairesController::class,'CreateProfesseur'])->name('create.professeur');

Route::get('/seances', [SeancesController::class,'index'])->name('seances.index');
Route::post('/seances/create', [SeancesController::class,'CreateSeance'])->name('create.seance');







