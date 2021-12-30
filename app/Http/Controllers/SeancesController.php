<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Locataire;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeancesController extends Controller
{
    public function index(){
        $groupes = Groupe::all();
        $locataires = Locataire::all();
        return view('seances',compact('groupes'),compact('locataires'));
    }

    public function getSeances(){
        $seances = Seance::all();
        return $seances;
    }

    public function CreateSeance(Request $request){
        $validateData = $request->validate([
        'groupe'=>'required|integer|gt:0',
        'locataire'=>'required|integer|gt:0',
        'time'=>'required|date_format:H:i',
        'date'=>'required|date_format:Y-m-d',
        'chk'=>'required',
        ]);
        $groupe = $validateData['groupe'];
        $locataire = $validateData['locataire'];
        $time = $validateData['time'];
        $date = $validateData['date'];
        
        Seance::create($request->all());
        return redirect()->route('seances.index')
                        ->with('success','Seance created successfully.');

      }



}
