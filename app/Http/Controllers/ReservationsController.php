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
       return view('reservations',compact('title','locations','groupes','locataires'));
   }

   public function CreateReservation(Request $request){
        
    $datedeb = $request->input('andeb').'-'.$request->input('moisdeb').'-'.$request->input('jourdeb');
    $datefin = $request->input('anfin').'-'.$request->input('moisfin').'-'.$request->input('jourfin');

 $request->merge([
   'datedeb' => $datedeb,
   'datefin' => $datefin
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
     $dtb = $validateData['datedeb'];
     $dtf = $validateData['datefin'];
     $groupe_id = $validateData['groupe'];
     $locataire_id = $validateData['locataire'];
     $location_id = $validateData['location'];
   
     $suites = DB::table('locations')->whereNotIn('id', function($query) use ($dtb, $dtf){
       $query->select('id_loc')
       ->from('reservations')
       ->whereBetween ('datedeb', [ $dtb, $dtf ])
       ->orwhereBetween('datefin', [ $dtb, $dtf ])
       ->distinct();
   })->get();
  }


   public function getReservations(){
       $reservations = Reservation::select('*')
       ->where('archive_state', '=', 0)->get();
       return $reservations;
  }


}
