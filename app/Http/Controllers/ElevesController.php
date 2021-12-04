<?php

namespace App\Http\Controllers;

use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ElevesController extends Controller
{
    public function index(){
        return view('eleves');
    }

    public function CreateEleve(Request $request){
        $validateData = $request->validate([
        'groupes'=>'required',
        'prenom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classe'=>'required',
        'tel'=>'required|min:8|max:8|numeric',
        'chk'=>'required'
        ]);
        $groupes = $request->input('groupes');
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $classe = $request->input('classe');
        $tel = $request->input('tel');
        return $request->all();
      }
  

      public function UpdateEleve(Request $request){
        $validateData = $request->validate([
        'groupesu'=>'required',
        'eleve'=>'required',
        'prenomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classeu'=>'required',
        'telu'=>'required|min:8|max:8|numeric',
        'chku'=>'required'
        ]);
        $groupes = $request->input('groupesu');
        $eleve = $request->input('eleve');
        $prenom = $request->input('prenomu');
        $nom = $request->input('nomu');
        $classe = $request->input('classeu');
        $tel = $request->input('telu');
        return $request->all();
      }

      public function findEleveGroups(Request $request){
        $validateData = $request->validate([
        'elevef'=>'required',
        'chk'=>'required'
        ]);
    
        $eleve = $request->input('elevef');
      
        return $request->all();
      }

}
