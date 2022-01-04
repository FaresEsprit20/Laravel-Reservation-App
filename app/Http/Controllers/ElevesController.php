<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Groupe;
use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ElevesController extends Controller
{

   public function index(){
      $groupes = Groupe::select('*')
      ->where('archive_state', '=', 0)->get();
        return view('eleves',compact('groupes'));
    }

   public function getEleves(){
      $eleves = Eleve::select('*')
      ->where('archive_state', '=', 0)->get();
      return $eleves;
   }

   public function CreateEleve(Request $request){
        $validateData = $request->validate([
        'groupes'=>'required|array',
        'prenom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classe'=>'required|min:3',
        'tel'=>'required|integer|digits:8|unique:eleves,tel',
        'chk'=>'required'
        ]);
        $eleve = new Eleve();
        $eleve->prenom_eleve = $validateData['prenom'];
        $eleve->nom_eleve = $validateData['nom'];
        $eleve->classe = $validateData['classe'];
        $eleve->tel = $validateData['tel'];
        $grp = $validateData['groupes'];
        $eleve->save();
        $eleve->groupes()->sync($grp);
        
        return $request->all();
        
         // return redirect()->route('eleves.index')
               // ->with('success','Eleve created successfully.');
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
