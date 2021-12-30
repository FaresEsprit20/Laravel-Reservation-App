<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ElevesController extends Controller
{
    public function index(){
        return view('eleves');
    }

    public function getEleves(){
      $eleves = Eleve::all();
      return $eleves;
   }
    public function CreateEleve(Request $request){
        $validateData = $request->validate([
        'groupes'=>'required|integer|min:1',
        'prenom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classe'=>'required|min:3',
        'tel'=>'required|integer|digits:8',
        'chk'=>'required'
        ]);
        Eleve::create($request->all());
        return redirect()->route('eleves.index')
                        ->with('success','Eleve created successfully.');
      }
  

      public function UpdateEleve(Request $request){
        $validateData = $request->validate([
        'groupesu'=>'required|integer|gt:0',
        'eleve'=>'required|integer|gt:0',
        'prenomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classeu'=>'required|min:3',
        'telu'=>'required|integer|digits:8',
        'chku'=>'required'
        ]);
        $groupes = $validateData['groupesu'];
        $eleve = $validateData['eleve'];
        $prenom = $validateData['prenomu'];
        $nom = $validateData['nomu'];
        $classe = $validateData['classeu'];
        $tel = $validateData['telu'];
        return $request->all();
      }

     public function findEleveGroups(Request $request){
        $validateData = $request->validate([
        'elevef'=>'required|integer|gt:0',
        'chk'=>'required'
        ]);
        $eleve = $validateData['elevef'];      
        return $request->all();
      }

}
