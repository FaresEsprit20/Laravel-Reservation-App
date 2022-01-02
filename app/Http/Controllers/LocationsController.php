<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    public function index(){
      $locations = Location::select('*')
      ->where('archive_state', '=', 0)->get();
        return view('locations',compact('locations'));
    }

    public function suitesvidesView(){
      return view('suitesvides');
    }

    public function getLocations(){
       $locations = Location::select('*')
       ->where('archive_state', '=', 0)->get();
       return $locations;
    }

public function getSuitesVides(Request $request){

     $datedeb = $request->input('andeb').'-'.$request->input('moisdeb').'-'.$request->input('jourdeb');
     $datefin = $request->input('anfin').'-'.$request->input('moisfin').'-'.$request->input('jourfin');

  $request->merge([
    'datedeb' => $datedeb,
    'datefin' => $datefin
  ]);

      $validateData = $request->validate([
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
    
      $suites = DB::table('locations')->whereNotIn('id', function($query) use ($dtb, $dtf){
        $query->select('id_loc')
        ->from('reservations')
        ->whereBetween ('datedeb', [ $dtb, $dtf ])
        ->orwhereBetween('datefin', [ $dtb, $dtf ])
        ->distinct();
    })->get();

      return $request->all();
    }

    public function CreateLocation(Request $request){
        $validateData = $request->validate([
        'nomlocation'=>'required|unique:locations,location_name',
        'chk'=>'required'
        ]);
        $locationName = $validateData['nomlocation'];
        $location = new Location();
        $location->location_name = $locationName;
        $location->save();
           
        return redirect()->route('locations.index')
                        ->with('success','Location created successfully.');
      }

      public function UpdateLocation(Request $request){
        $validateData = $request->validate([
        'location'=>'required|integer|gt:0',
        'nomlocationu'=>'required||max:20|unique:locations,location_name',
        'chku'=>'required'
        ]);
        $location = $validateData['location'];
        $nomlocation = $validateData['nomlocationu'];
        //$location = DB::table('locations')->where('id',$request->location)->first();
        DB::table('locations')->where('id',$location)->update([
          'nomlocation'=> $nomlocation
          ]);
       
      
        return back()->with('post-update','post has been done');
      }

    /*public function DeleteLocation(Request $request){
        $validateData = $request->validate([
        'location'=>'required|integer|gt:0',
        'nomlocationu'=>'required||max:20',
        'chku'=>'required'
        ]);
        DB::table('locations')->where('id',$request->$request)->delete();
        $location = $validated[('location');
        $nomlocation = $request->input('nomlocationu');
        return $request->all();
      }
      */

}
