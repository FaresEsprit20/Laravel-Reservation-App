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

    public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index(){
       
        $groupes = Groupe::select('*')
        ->where('archive_state', '=', 0)->get();
        $locataires =  Locataire::select('*')
        ->where('archive_state', '=', 0)->get();
        $locations = Location::select('*')
        ->where('archive_state', '=', 0)->get();
        $seances = Seance::where('archive_state',0)->get();

       
       return view('seances',compact('groupes','locataires','locations','seances'));

    }

    public function getSeances(){
        $seances = Seance::select('*')
        ->where('archive_state', '=', 0)->get();
        return $seances;
    }

    public function getSeanceById($id){
        $seance = Seance::findOrfail($id);
        $eleves = $seance->eleves;
        $locataire = Locataire::findOrfail($seance->locataire_id);
        $groupe = Groupe::findOrfail($seance->groupe_id);
        
        return view('seancedetails',compact('seance','eleves','locataire','groupe'));
    }


    public function CreateSeance(Request $request){
        
        $validateData = $request->validate([
        'groupe'=>'required|integer|gt:0',
        'prix'=>'required|integer|gt:0',
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
        $prix = $validateData['prix'];
        $seance = new Seance();
        $seance->groupe()->associate($groupe);
        $seance->locataire()->associate($locataire);
        $seance->location()->associate($location);
        $seance->heure = $time;
        $seance->date = $date;
        $seance->prixUnitaire = $prix;

        $available = Seance::select('*')
        ->where('archive_state', '=', 0)
        ->where('date', '=', $date)
        ->where('heure', '=', $time)
        ->where('location_id', '=', $validateData['location'])
        ->get();

        if($available->isEmpty()){
            $seance->save();
            $groupeeleves = DB::table('groupes_eleves')->where('groupe_id', '=', $validateData['groupe'])
            ->pluck('eleve_id');
             $seance->eleves()->attach($groupeeleves);
             DB::table('seances_locataires')->insert(
                array(
                       'seance_id'     =>   $seance->id, 
                       'locataire_id'   =>  $validateData['locataire']
                )
           );
           // $seance->locataires()->attach($locataire);
          

            return redirect()->route('seances.index')
            ->with('create_seance_success','Seance created successfully.');

        }else{
            return redirect()->route('seances.index')
            ->with('create_seance_error','Can not create this seance on this date');
        }
         
        //return request()->all();

      }



}
