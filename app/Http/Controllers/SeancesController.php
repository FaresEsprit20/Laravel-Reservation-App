<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SeancesController extends Controller
{
    public function index(){
       
        $groupes = Groupe::select('*')
        ->where('archive_state', '=', 0)->get();
        $locataires =  Locataire::select('*')
        ->where('archive_state', '=', 0)->get();
        $locations = Location::select('*')
        ->where('archive_state', '=', 0)->get();
        $seances = DB::table('seances')
        ->leftJoin('locataires', 'seances.locataire_id', '=', 'locataires.id')
        ->leftJoin('groupes', 'seances.groupe_id', '=', 'groupes.id')
        ->where('seances.archive_state', '=', 0)
        ->get();

       //return $seances;
        return view('seances',compact('groupes','locataires','locations','seances'));

    }

    public function getSeances(){
        $seances = Seance::select('*')
        ->where('archive_state', '=', 0)->get();
        return $seances;
    }

    public function getSeanceById($id){
        $seance = DB::table('seances')
        ->leftJoin('locataires', 'seances.locataire_id', '=', 'locataires.id')
        ->leftJoin('groupes', 'seances.groupe_id', '=', 'groupes.id')
        ->leftJoin('locations', 'seances.location_id', '=', 'locations.id')
        ->where('seances.archive_state', '=', 0)
        ->where('seances.id', '=', $id)
        ->get();

        
        return view('seancedetails',compact('seance'));
    }


    public function CreateSeance(Request $request){
        
        $validateData = $request->validate([
        'groupe'=>'required|integer|gt:0',
        'locataire'=>'required|integer|gt:0',
        'location'=>'required|integer|gt:0',
        'heure'=>'required|date_format:H:i',
        'date'=>'required|date_format:Y-m-d',
        'chk'=>'required',
        ]);
        $groupe = Groupe::find($validateData['groupe']);
        $locataire =  Locataire::find($validateData['locataire']);
        $location =  Location::find($validateData['location']);
        $time = $validateData['heure'];
        $date = $validateData['date'];
        $seance = new Seance();
        $seance->groupe()->associate($groupe);
        $seance->locataire()->associate($locataire);
        $seance->location()->associate($location);
        $seance->heure = $time;
        $seance->date = $date;

        $available = Seance::select('*')
        ->where('archive_state', '=', 0)
        ->where('date', '=', $date)
        ->where('heure', '=', $time)
        ->where('location_id', '=', $validateData['location'])
        ->get();

        if($available->isEmpty()){
            $seance->save();
            return redirect()->route('seances.index')
            ->with('success','Seance created successfully.');

        }else{
            return redirect()->route('seances.index')
            ->with('error','Can not create this seance on this date');
        }
         
        //return request()->all();

      }



}
