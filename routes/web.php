<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocatairesController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\SessionController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
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
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle'])->middleware('auth');
Route::get('/', [HomeController::class,'index'])->name('home.index')->middleware('auth');
//Route::get('/login', [LoginController::class,'index'])->name('login.index');

//Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.index');
//Route::get('/', [LoginController::class,'index'])->name('login.index');

//Route::post('/login', [LoginController::class,'loginSubmit'])->name('login.submit');

Route::get('/home', [HomeController::class,'index'])->name('home.index')->middleware('auth');

Route::get('/reservations', [ReservationsController::class,'index'])->name('reservations.index')->middleware('auth');
Route::post('/reservations/create', [ReservationsController::class,'CreateReservation'])->name('create.reservation')->middleware('auth');
Route::get('/reservations/view/{id}', [ReservationsController::class,'getReservationById'])->name('get.reservation')->middleware('auth');

Route::get('/eleves', [ElevesController::class,'index'])->name('eleves.index')->middleware('auth');
Route::get('/eleves/view/{id}', [ElevesController::class,'getEleveById'])->name('get.eleve')->middleware('auth');
Route::get('/eleves/view/{id}/payerseance/{seanceId}', [ElevesController::class,'editSeanceEleve'])->name('payer.eleve')->middleware('auth');
Route::get('/eleves/view/{id}/present/{seanceId}', [ElevesController::class,'setElevePresent'])->name('present.eleve')->middleware('auth');
Route::get('/eleves/view/{id}/absent/{seanceId}', [ElevesController::class,'setEleveAbsent'])->name('absent.eleve')->middleware('auth');
Route::post('/eleves/create', [ElevesController::class,'CreateEleve'])->name('create.eleve')->middleware('auth');
Route::post('/eleves/findGroups', [ElevesController::class,'findEleveGroups'])->name('find.eleve.groups')->middleware('auth');
Route::put('/eleves/update', [ElevesController::class,'UpdateEleve'])->name('update.eleve')->middleware('auth');
Route::post('/eleves/facturer', [ElevesController::class,'FacturerEleve'])->name('eleve.facturer')->middleware('auth');
Route::put('/eleves/seances/paiment/update', [ElevesController::class,'updateSeanceEleve'])->name('payer.eleve.update')->middleware('auth');

Route::get('/factures', [FacturesController::class,'index'])->name('factures.index')->middleware('auth');
Route::get('/factures/view/{id}', [FacturesController::class,'getFactureById'])->name('get.facture')->middleware('auth');
Route::get('/facturesprofesseurs/view/{id}', [FacturesController::class,'getFactureProfesseurById'])->name('get.factureprofesseur')->middleware('auth');
Route::get('/factures/paiement', [FacturesController::class,'PayementView'])->name('paiement.index')->middleware('auth');
Route::post('/factures/paiement/eleves/payer', [FacturesController::class,'PayerEleve'])->name('paiement.eleve.payer')->middleware('auth');
Route::post('/factures/paiement/enseignants/payer', [FacturesController::class,'PayerEnseignant'])->name('paiement.ens.payer')->middleware('auth');
Route::post('/factures/paiement/groupes', [FacturesController::class,'FacturerGroupe'])->name('paiement.groupes')->middleware('auth');
Route::post('/factures/paiement/enseignants', [FacturesController::class,'FacturerEnseignants'])->name('paiement.ens')->middleware('auth');

Route::get('/groupes', [GroupesController::class,'index'])->name('groupes.index');
Route::post('/groupes/create', [GroupesController::class,'CreateGroup'])->name('create.group')->middleware('auth');
Route::put('/groupes/update', [GroupesController::class,'UpdateGroup'])->name('update.group')->middleware('auth');
Route::get('/groupes/view/{id}', [GroupesController::class,'getGroupeById'])->name('get.group')->middleware('auth');

Route::get('/locations', [LocationsController::class,'index'])->name('locations.index')->middleware('auth');
Route::get('/locations/get', [LocationsController::class,'getLocations'])->name('locations.get')->middleware('auth');
Route::post('/locations/create', [LocationsController::class,'CreateLocation'])->name('create.location')->middleware('auth');
Route::put('/locations/update', [LocationsController::class,'UpdateLocation'])->name('update.location')->middleware('auth');
Route::get('/locations/view/{id}', [LocationsController::class,'getLocationById'])->name('location.details')->middleware('auth');
Route::get('/locations/view/{id}/delete', [LocationsController::class,'deleteLocationById'])->name('location.delete')->middleware('auth');
Route::get('/locations/suitesvides', [LocationsController::class,'suitesvidesView'])->name('suitesvides.list')->middleware('auth');
Route::post('/locations/suitesvides/list', [LocationsController::class,'getSuitesVides'])->name('suitesvides.list.get')->middleware('auth');

Route::get('/professeurs', [LocatairesController::class,'professeursView'])->name('professeurs.index')->middleware('auth');
Route::get('/professeurs/view/{id}', [LocatairesController::class,'getProfesseurById'])->name('get.professeur')->middleware('auth');
Route::get('/professeurs/view/{id}/payerseance/{seanceId}', [LocatairesController::class,'editSeanceLocataire'])->name('payer.locataire')->middleware('auth');
Route::get('/professeurs/view/{id}/present/{seanceId}', [LocatairesController::class,'setLocatairePresent'])->name('present.locataire')->middleware('auth');
Route::get('/professeurs/view/{id}/absent/{seanceId}', [LocatairesController::class,'setLocataireAbsent'])->name('absent.locataire')->middleware('auth');
Route::post('/professeurs/create', [LocatairesController::class,'CreateProfesseur'])->name('create.professeur')->middleware('auth');
Route::put('/professeurs/update', [LocatairesController::class,'UpdateProfesseur'])->name('update.professeur')->middleware('auth');
Route::post('/professeurs/facturer', [LocatairesController::class,'FacturerProfesseur'])->name('professeur.facturer')->middleware('auth');
Route::put('/professeurs/seances/paiment/update', [LocatairesController::class,'updateSeanceLocataire'])->name('payer.locataire.update')->middleware('auth');

Route::get('/seances', [SeancesController::class,'index'])->name('seances.index')->middleware('auth');
Route::post('/seances/create', [SeancesController::class,'CreateSeance'])->name('create.seance')->middleware('auth');
Route::get('/seances/view/{id}', [SeancesController::class,'getSeanceById'])->name('seance.details')->middleware('auth');


Auth::routes(['register'=> false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
