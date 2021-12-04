<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $groupe = $request->input('groupe');
        
        return $request->all();
      }
    
      public function UpdateGroup(Request $request){
        $validateData = $request->validate([
        'groupeu'=>'required|min:3|max:50',
        'nomgroupe'=>'required|min:3|max:50',
        'chku'=>'required'
        ]);
        $groupe = $request->input('groupeu');
        $nomgroupe = $request->input('nomgroupe');
       
        return $request->all();
      }



}
