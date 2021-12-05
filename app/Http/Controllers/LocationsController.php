<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index(){
        return view('locations');
    }

    public function suitesvidesView(){
      return view('suitesvides');
    }

    public function getSuitesVides(Request $request){
      $validateData = $request->validate([
      'jourdeb'=>'required|digits:2|integer',
      'moisdeb'=>'required|digits:2|integer',
      'andeb'=>'required|digits:4|integer|min:2021|max:2040',
      'heuredeb'=>'required|date_format:H:i',
      'jourfin'=>'required|digits:2|integer',
      'moisfin'=>'required|digits:2|integer',
      'anfin'=>'required|digits:4|integer|min:2021|max:2040',
      'heurefin'=>'required|date_format:H:i',
      'chks'=>'required'
      ]);
      $jourdeb = $request->input('jourdeb');
      $moisdeb = $request->input('moisdeb');
      $andeb = $request->input('andeb');
      $heuredeb = $request->input('heuredeb');
      $jourfin = $request->input('jourfin');
      $moisfin = $request->input('moisfin');
      $anfin = $request->input('anfin');
      $heurefin = $request->input('heurefin');
      return $request->all();
    }

    public function CreateLocation(Request $request){
        $validateData = $request->validate([
        'nomlocation'=>'required',
        'chk'=>'required'
        ]);
        $location = $request->input('nomlocation');
        return $request->all();
      }

      public function UpdateLocation(Request $request){
        $validateData = $request->validate([
        'location'=>'required|integer|gt:0',
        'nomlocationu'=>'required||max:20',
        'chku'=>'required'
        ]);
        $location = $request->input('location');
        $nomlocation = $request->input('nomlocationu');
        return $request->all();
      }


}
