<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    
   public function index(){
       $title = 'reservation app';
       $locations = Location::select('*')
        ->where('archive_state', '=', 0)->get();
       $groupes = Groupe::select('*')
        ->where('archive_state', '=', 0)->get();
       $locataires =  Locataire::select('*')
        ->where('archive_state', '=', 0)->get();

      /* $reservations = DB::table('reservations')
       ->leftJoin('locataires', 'reservations.locataire_id', '=', 'locataires.id')
       ->leftJoin('locations', 'reservations.location_id', '=', 'locations.id')
       ->where('reservations.archive_state', '=', 0)
       ->get();*/
       $reservations = Reservation::where('archive_state', '=', 0)->get();
       return view('reservations',compact('title','locations','groupes','locataires','reservations'));
   }


     public function getReservationById($id){

      $reservation = Reservation::find($id);

      return View('reservationdetails',compact('reservation'));
     }

   public function CreateReservation(Request $request){
        
    $datedeb = $request->input('andeb').'-'.$request->input('moisdeb').'-'.$request->input('jourdeb');
    $datefin = $request->input('anfin').'-'.$request->input('moisfin').'-'.$request->input('jourfin');

    $dha = $datedeb.' '.$request->input('heuredeb');
    $dhf = $datefin.' '.$request->input('heurefin');


 $request->merge([
   'datedeb' => $datedeb,
   'datefin' => $datefin,
   'dha' => $dha,
   'dhf' =>$dhf
 ]);

     $validateData = $request->validate([
     'location'=>'required|integer|gt:0',
     'jourdeb'=>'required|digits:2',
     'moisdeb'=>'required|digits:2',
     'andeb'=>'required|digits:4|integer|min:2021|max:2040',
     'heuredeb'=>'required|date_format:H:i',
     'jourfin'=>'required|digits:2',
     'moisfin'=>'required|digits:2',
     'anfin'=>'required|digits:4|integer|min:2021|max:2040|gte:andeb',
     'heurefin'=>'required|date_format:H:i',
     'datedeb'=>'bail|required|date|date_format:Y-m-d',
     'datefin'=>'bail|required|date|date_format:Y-m-d|after_or_equal:datedeb',
     'dha'=>'bail|required|date_format:Y-m-d H:i|after:now',
     'dhf'=>'bail|required|date_format:Y-m-d H:i|after:dha',
     'locataire'=>'required|integer|gt:0',
     'groupe'=>'required|integer|gt:0',
     'chks'=>'required'
     ]);
   
     $jourdeb = $validateData['jourdeb'];
     $moisdeb = $validateData['moisdeb'];
     $andeb = $validateData['andeb'];
     $heuredeb = $validateData['heuredeb'];
     $jourfin = $validateData['jourfin'];
     $moisfin = $validateData['moisfin'];
     $anfin = $validateData['anfin'];
     $heurefin = $validateData['heurefin'];
     $db = $validateData['datedeb'];
     $df = $validateData['datefin'];
     $dtb = $validateData['datedeb'].' '.$heuredeb;
     $dtf = $validateData['datefin'].' '.$heurefin;
     $groupe_id = $validateData['groupe'];
     $locataire_id = $validateData['locataire'];
     $location_id = $validateData['location'];
   
     $reserved = DB::table('locations')->whereIn('id', function($query) use ($dtb, $dtf){
       $query->select('location_id')
       ->from('reservations')
       ->whereBetween ('datetimedeb', [ $dtb, $dtf ])
       ->orwhereBetween('datetimefin', [ $dtb, $dtf ])
       ->distinct();
   })->get();

   if($reserved->isEmpty()){
    $locataire =  Locataire::find($validateData['locataire']);
    $location =  Location::find($validateData['location']);

    $reservation = new Reservation();
    $reservation->jourdeb = $jourdeb;
    $reservation->moisdeb = $moisdeb;
    $reservation->andeb = $andeb;
    $reservation->heuredeb = $heuredeb;
    $reservation->jourfin = $jourfin;
    $reservation->moisfin = $moisfin;
    $reservation->anfin = $anfin;
    $reservation->heurefin = $heurefin;
    $reservation->datedeb = $db;
    $reservation->datefin = $df;
    $reservation->datetimedeb = $dtb;
    $reservation->datetimefin = $dtf;
    $reservation->nom_groupe = $groupe_id;
    $reservation->locataire()->associate($locataire);
    $reservation->location()->associate($location);

    $reservation->save();

    return redirect()->route('reservations.index')
    ->with('success','Reservation created successfully.');

   }else{
    return redirect()->route('seances.index')
    ->with('error','Can not create this seance on this date');
       return $reserved;
   }


  }


   public function getReservations(){
       $reservations = Reservation::select('*')
       ->where('archive_state', '=', 0)->get();
       return $reservations;
  }


}
