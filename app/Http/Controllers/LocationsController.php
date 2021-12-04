<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index(){
        return view('locations');
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
        'location'=>'required|max:20',
        'nomlocationu'=>'required||max:20',
        'chku'=>'required'
        ]);
        $location = $request->input('location');
        $nomlocation = $request->input('nomlocationu');
        return $request->all();
      }


}
