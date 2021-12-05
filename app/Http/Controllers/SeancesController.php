<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeancesController extends Controller
{
    public function index(){
        return view('seances');
    }

    public function CreateSeance(Request $request){
        $validateData = $request->validate([
        'groupe'=>'required|integer|gt:0',
        'locataire'=>'required|integer|gt:0',
        'time'=>'required|date_format:H:i',
        'date'=>'required|date_format:Y-m-d',
        'chk'=>'required',
        ]);
        $groupe = $request->input('groupe');
        $locataire = $request->input('locataire');
        $time = $request->input('time');
        $date = $request->input('date');
        
        return $request->all();
      }


}
