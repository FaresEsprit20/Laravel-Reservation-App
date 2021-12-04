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
        'groupe'=>'required',
        'locataire'=>'required',
        'time'=>'required|date_format:H:i',
        'date'=>'required|date_format:Y-m-d',
        'chk'=>'required',
        ]);
        $location = $request->input('nomlocation');
        return $request->all();
      }

}
