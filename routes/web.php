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
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/', [HomeController::class,'index'])->name('home.index');
//Route::get('/login', [LoginController::class,'index'])->name('login.index');

//Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.index');
//Route::get('/', [LoginController::class,'index'])->name('login.index');

//Route::post('/login', [LoginController::class,'loginSubmit'])->name('login.submit');

Route::get('/home', [HomeController::class,'index'])->name('home.index');

Route::get('/reservations', [ReservationsController::class,'index'])->name('reservations.index');
Route::post('/reservations/create', [ReservationsController::class,'CreateReservation'])->name('create.reservation');
Route::get('/reservations/view/{id}', [ReservationsController::class,'getReservationById'])->name('get.reservation');

Route::get('/eleves', [ElevesController::class,'index'])->name('eleves.index');
Route::get('/eleves/view/{id}', [ElevesController::class,'getEleveById'])->name('get.eleve');
Route::get('/eleves/view/{id}/payerseance/{seanceId}', [ElevesController::class,'editSeanceEleve'])->name('payer.eleve');
Route::get('/eleves/view/{id}/present/{seanceId}', [ElevesController::class,'setElevePresent'])->name('present.eleve');
Route::get('/eleves/view/{id}/absent/{seanceId}', [ElevesController::class,'setEleveAbsent'])->name('absent.eleve');
Route::post('/eleves/create', [ElevesController::class,'CreateEleve'])->name('create.eleve');
Route::post('/eleves/findGroups', [ElevesController::class,'findEleveGroups'])->name('find.eleve.groups');
Route::put('/eleves/update', [ElevesController::class,'UpdateEleve'])->name('update.eleve');
Route::post('/eleves/facturer', [ElevesController::class,'FacturerEleve'])->name('eleve.facturer');
Route::put('/eleves/seances/paiment/update', [ElevesController::class,'updateSeanceEleve'])->name('payer.eleve.update');

Route::get('/factures', [FacturesController::class,'index'])->name('factures.index');
Route::get('/factures/view/{id}', [FacturesController::class,'getFactureById'])->name('get.facture');
Route::get('/facturesprofesseurs/view/{id}', [FacturesController::class,'getFactureProfesseurById'])->name('get.factureprofesseur');
Route::get('/factures/paiement', [FacturesController::class,'PayementView'])->name('paiement.index');
Route::post('/factures/paiement/eleves/payer', [FacturesController::class,'PayerEleve'])->name('paiement.eleve.payer');
Route::post('/factures/paiement/enseignants/payer', [FacturesController::class,'PayerEnseignant'])->name('paiement.ens.payer');
Route::post('/factures/paiement/groupes', [FacturesController::class,'FacturerGroupe'])->name('paiement.groupes');
Route::post('/factures/paiement/enseignants', [FacturesController::class,'FacturerEnseignants'])->name('paiement.ens');

Route::get('/groupes', [GroupesController::class,'index'])->name('groupes.index');
Route::post('/groupes/create', [GroupesController::class,'CreateGroup'])->name('create.group');
Route::put('/groupes/update', [GroupesController::class,'UpdateGroup'])->name('update.group');
Route::get('/groupes/view/{id}', [GroupesController::class,'getGroupeById'])->name('get.group');

Route::get('/locations', [LocationsController::class,'index'])->name('locations.index');
Route::get('/locations/get', [LocationsController::class,'getLocations'])->name('locations.get');
Route::post('/locations/create', [LocationsController::class,'CreateLocation'])->name('create.location');
Route::put('/locations/update', [LocationsController::class,'UpdateLocation'])->name('update.location');
Route::get('/locations/view/{id}', [LocationsController::class,'getLocationById'])->name('location.details');
Route::get('/locations/view/{id}/delete', [LocationsController::class,'deleteLocationById'])->name('location.delete');
Route::get('/locations/suitesvides', [LocationsController::class,'suitesvidesView'])->name('suitesvides.list');
Route::post('/locations/suitesvides/list', [LocationsController::class,'getSuitesVides'])->name('suitesvides.list.get');
Route::get('/locations/getTotalPieChart', [LocationsController::class,'TotalChart']);


Route::get('/professeurs', [LocatairesController::class,'professeursView'])->name('professeurs.index');
Route::get('/professeurs/view/{id}', [LocatairesController::class,'getProfesseurById'])->name('get.professeur');
Route::get('/professeurs/view/{id}/payerseance/{seanceId}', [LocatairesController::class,'editSeanceLocataire'])->name('payer.locataire');
Route::get('/professeurs/view/{id}/present/{seanceId}', [LocatairesController::class,'setLocatairePresent'])->name('present.locataire');
Route::get('/professeurs/view/{id}/absent/{seanceId}', [LocatairesController::class,'setLocataireAbsent'])->name('absent.locataire');
Route::post('/professeurs/create', [LocatairesController::class,'CreateProfesseur'])->name('create.professeur');
Route::put('/professeurs/update', [LocatairesController::class,'UpdateProfesseur'])->name('update.professeur');
Route::post('/professeurs/facturer', [LocatairesController::class,'FacturerProfesseur'])->name('professeur.facturer');
Route::put('/professeurs/seances/paiment/update', [LocatairesController::class,'updateSeanceLocataire'])->name('payer.locataire.update');

Route::get('/seances', [SeancesController::class,'index'])->name('seances.index');
Route::post('/seances/create', [SeancesController::class,'CreateSeance'])->name('create.seance');
Route::get('/seances/view/{id}', [SeancesController::class,'getSeanceById'])->name('seance.details');


Auth::routes(['register'=> false]);

