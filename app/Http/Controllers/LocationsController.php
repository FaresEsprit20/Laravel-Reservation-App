<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use App\Models\Location;
use App\Models\Seance;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LocationsController extends Controller
{
    public function index(){
      $locations = Location::select('*')
      ->where('archive_state', '=', 0)->get();
        return view('locations',compact('locations'));
    }


    public function TotalChart(){

        $overalldata = $this->OverallChart();
        $thisyeardata = $this->ThisYearChart();
        $monthlydata = $this->MonthlyChart();
        $weeklydata = $this->WeeklyChart();

        $response = array();

        $response['overalldata'] = $overalldata;
        $response['thisyeardata'] = $thisyeardata;
        $response['monthlydata'] = $monthlydata;
        $response['weeklydata'] = $weeklydata;

      return response()->json($response);
    }


    public function OverallChart(){

      $location_names = Location::select('locations.id as location_id', 'locations.location_name')
      ->join('seances','locations.id','=','seances.location_id')
      ->where('locations.archive_state',0)
      ->where('seances.archive_state',0)
      ->groupBy('locations.id')
      ->get();
      
     $statsCollection = collect();
     $statsarray = [];
     $total_count = count(Seance::select('*')->where('archive_state',0)->get());

      foreach($location_names as $location){
        $location_statistics = Location::selectRaw('locations.id,locations.location_name,(COUNT(seances.location_id) / ?) * 100 as percentage ',[$total_count])
        ->join('seances','locations.id','seances.location_id')
        ->where('seances.archive_state',0)
        ->where('seances.location_id','=',$location->location_id)->groupBy('locations.location_name')->get();
        array_push($statsarray,$location_statistics);
       
      }
      
      foreach($statsarray as $array){
        foreach($array as $item){
        /*  array_push($labels,$item['location_name']);
          array_push($indexedids,$item['id']);*/
          $statsCollection->push($item);
        }        
      }

      return $statsCollection;
    }

    public function ThisYearChart(){
      
      $location_names = Location::select('locations.id as location_id', 'locations.location_name')
      ->join('seances','locations.id','=','seances.location_id')
      ->where('locations.archive_state',0)
      ->where('seances.archive_state',0)
      ->whereYear('seances.date',date('Y'))
      ->groupBy('locations.id')
      ->get();
      
     $statsCollection = collect();
     $statsarray = [];
     $total_count = count(Seance::select('*')->where('archive_state',0)
     ->whereYear('seances.date', date('Y'))->get());

      foreach($location_names as $location){
        $location_statistics = Location::selectRaw('locations.id,locations.location_name,(COUNT(seances.location_id) / ?) * 100 as percentage ',[$total_count])
        ->join('seances','locations.id','=','seances.location_id')
        ->where('seances.archive_state',0)
        ->where('seances.location_id','=',$location->location_id)
        ->whereYear('seances.date', date('Y'))
        ->groupBy('locations.location_name')
        ->get();
        array_push($statsarray,$location_statistics);
      }
      
      foreach($statsarray as $array){
        foreach($array as $item){
          $statsCollection->push($item);
        }
      }

      return $statsCollection;
    }


    public function MonthlyChart(){

     $statsarray = [];

     $location_names = Location::select('locations.id as location_id', 'locations.location_name')
     ->join('seances','locations.id','=','seances.location_id')
     ->where('locations.archive_state',0)
     ->where('seances.archive_state',0)
     ->whereYear('seances.date',date('Y'))
     ->groupBy('locations.id')
     ->get();

     foreach( $location_names as $location){
        $year = [0,0,0,0,0,0,0,0,0,0,0,0]; //initialize all months to 0 for a single year
     for($month = 0; $month <12; $month++)
     {
        $location_statistics = Location::select(DB::raw('locations.id'),DB::raw('locations.location_name'),
         DB::raw('COUNT(seances.location_id) as percentage'))
        ->join('seances','locations.id','=','seances.location_id')
        ->where('seances.archive_state',0)
        ->where('seances.location_id','=',$location->location_id)
        ->whereYear('seances.date', date('Y'))
        ->whereMonth('seances.date', '=', $month)
        ->groupBy('locations.id')
        ->get()
        ->toArray();

         if(count($location_statistics) > 0){
          foreach($location_statistics as $key){
            $year[$month -1] = $key['percentage'];//update each month with the total value
            }   
         }

        }//endfor months
        $merged['location_id'] = $location['location_id'];
        $merged['location_name'] = $location['location_name'];
        $merged['percentage'] = $year;
         
        
        array_push($statsarray,$merged);
      }

      return $statsarray;

    }

    public function WeeklyChart(){

      $statsarray = [];
   
         $location_statistics = Location::select(DB::raw('locations.id'),DB::raw('locations.location_name'),DB::raw('seances.date'),
         DB::raw("DAYNAME(seances.date) as dayname"),DB::raw('COUNT(seances.location_id) as percentage'))
         ->join('seances','locations.id','=','seances.location_id')
         ->where('seances.archive_state',0)
         ->whereBetween('seances.date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
         ->whereYear('seances.date', date('Y'))
         ->groupBy('locations.id')
         ->groupBy('seances.date')
         ->get()
         ->toArray();
 
         return $location_statistics;
    
     }

    public function suitesvidesView(){
      return view('suitesvides');
    }

    public function getLocations(){
       $locations = Location::select('*')
       ->where('archive_state', '=', 0)->get();
       return $locations;
    }

   
    public function getLocationById($id){
      $location = Location::findOrfail($id);
      $seanceslocation = Seance::select('*')
        ->where('location_id',$id)
        ->where('archive_state',0)
        ->get();
      return view('locationdetails',compact('location','seanceslocation'));
   }

   public function deleteLocationById($id){
    $location = Location::find($id);
    $location->delete();
   
    return back()->with('delete_success','Location deleted successfully');
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
        $query->select('location_id')
        ->from('reservations')
        ->whereBetween ('datetimedeb', [ $dtb, $dtf ])
        ->orwhereBetween('datetimefin', [ $dtb, $dtf ])
        ->distinct();
      })->get();
       
      if(count($suites) == 0 ){
        return View('suiteslist',compact('suites'))->with('empty_locations','0 available salles has been found');
      }
       return View('suiteslist',compact('suites'));

    }

    public function CreateLocation(Request $request){
        $validateData = $request->validate([
        'nomlocation'=>'required|max:20|unique:locations,location_name',
        'chk'=>'required'
        ]);
        $locationName = $validateData['nomlocation'];
        $location = new Location();
        $location->location_name = $locationName;
        $location->save();
           
        return redirect()->route('locations.index')
                        ->with('create_location_success','Location created successfully.');
      }

      
      public function UpdateLocation(Request $request){
        $validateData = $request->validate([
        'location'=>'required|integer|gt:0',
        'nomlocationu'=>'required|max:20|unique:locations,location_name',
        'chku'=>'required'
        ]);
        $location_id = $validateData['location'];
        $nomlocation = $validateData['nomlocationu'];
        
        $location = Location::findOrfail($location_id);
        $location->id = $location_id;
        $location->location_name = $nomlocation;
        $location->save();
      
        return back()->with('edit_location_success','Location has been updated');
      }



}
