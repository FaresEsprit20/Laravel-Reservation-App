<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupesController extends Controller
{
    public function index(){
        return view('groupes');
    }

    public function CreateGroup(Request $request){
        $validateData = $request->validate([
        'groupe'=>'required|min:3|max:50',
        'chk'=>'required',
        ]);
        $groupe = $validateData['groupe'];
        Groupe::create($request->all());
        return redirect()->route('groupes.index')
                        ->with('success','Groupe created successfully.');
      }
    
      public function UpdateGroup(Request $request){
        $validateData = $request->validate([
        'groupeu'=>'required|integer|gt:0',
        'nomgroupe'=>'required|min:3|max:50',
        'chku'=>'required'
        ]);
        $groupe = $validateData['groupeu'];
        $nomgroupe = $validateData['nomgroupe'];
        //$location = DB::table('locations')->where('id',$request->location)->first();
        DB::table('groupes')->where('id',$groupe)->update([
          'nomlocation'=> $nomgroupe
          ]);
        return $request->all();
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
        return $request->all();
      }

}
