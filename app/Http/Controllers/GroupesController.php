<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Groupe;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupesController extends Controller
{

  public function __construct()
	{
	    $this->middleware('auth');
	}
  

  public function indexJson(){
    $groupes = Groupe::select('*')
    ->where('archive_state', '=', 0)->get();
    $eleves = Eleve::select('*')
    ->where('archive_state', '=', 0)->get();
     return response()->json([
      'success' => true,
      'groupes' => $groupes,
      'eleves' => $eleves,
  ]);
  }
    public function index(){
      $groupes = Groupe::select('*')
      ->where('archive_state', '=', 0)->get();
      $eleves = Eleve::select('*')
      ->where('archive_state', '=', 0)->get();
       return view('groupes',compact('groupes'),compact('eleves'));
    }

    public function CreateGroup(Request $request){
        $validateData = $request->validate([
        'groupe'=>'required|min:3|max:50|unique:groupes,group_name',
        'chk'=>'required',
        ]);
        $groupeName = $validateData['groupe'];
        $groupe = new Groupe();
        $groupe->group_name = $groupeName;
        $groupe->save();
       
        return redirect()->route('groupes.index')
                        ->with('create_group_success','Groupe created successfully.');
      }

      public function getGroupeById($id){

        $groupe = Groupe::findOrfail($id);
        $eleves = $groupe->eleves;
        $seancesgroupe = Seance::select('*')
        ->where('groupe_id',$id)
        ->where('archive_state',0)
        ->get();

        return view('groupedetails',compact('groupe','eleves','seancesgroupe'));
      
      }
    
      public function UpdateGroup(Request $request){
        $validateData = $request->validate([
        'groupeu'=>'required|integer|gt:0',
        'nomgroupe'=>'required|min:3|max:50|unique:groupes,group_name',
        'chku'=>'required'
        ]);
      
        $groupe = $validateData['groupeu'];
        $nomgroupe = $validateData['nomgroupe'];
      
        $groupe = Groupe::findOrfail($groupe);
        $groupe->group_name = $nomgroupe;
        $groupe->save();

        return redirect()->route('groupes.index')
        ->with('edit_group_success','Groupe updated successfully.');
        
        }


      public function ArchivateGroup(Request $request){
        $validateData = $request->validate([
        'groupeu'=>'required|integer|gt:0'
        ]);
        $groupe = $validateData['groupeu'];
       
        //$location = DB::table('locations')->where('id',$request->location)->first();
        DB::table('groupes')->where('id',$groupe)->update([
          'archive_state'=> 1
          ]);
       
          return redirect()->route('groupes.index')
        ->with('archivate_group_success','Groupe archivated successfully.');
        
      }

      

}
