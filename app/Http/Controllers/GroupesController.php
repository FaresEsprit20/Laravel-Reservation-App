<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupesController extends Controller
{
  
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
                        ->with('success','Groupe created successfully.');
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
        ->with('success','Groupe updated successfully.');
        
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
        ->with('success','Groupe archivated successfully.');
        
      }

      

}
