<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    public function index(){
      $locations = Location::all();
        return view('locations',compact('locations'));
    }

    public function suitesvidesView(){
      return view('suitesvides');
    }

    public function getLocations(){
       $locations = Location::all();
       return $locations;
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
        DB::table('locations')->insert([
        'nomlocation'=> $request->nomlocation
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
        //$location = DB::table('locations')->where('id',$request->location)->first();
        DB::table('locations')->where('id',$request->location)->update([
          'nomlocation'=> $request->nomlocationu
          ]);
        $location = $request->input('location');
        $nomlocation = $request->input('nomlocationu');
        return back()->with('post-update','post has been done');
      }

    /*public function DeleteLocation(Request $request){
        $validateData = $request->validate([
        'location'=>'required|integer|gt:0',
        'nomlocationu'=>'required||max:20',
        'chku'=>'required'
        ]);
        DB::table('locations')->where('id',$request->$request)->delete();
        $location = $request->input('location');
        $nomlocation = $request->input('nomlocationu');
        return $request->all();
      }
      */

}
