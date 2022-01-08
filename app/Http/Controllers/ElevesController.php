<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Groupe;
use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Validation\Rule;
use Symfony\Component\Routing\Router;

class ElevesController extends Controller
{

   public function index(){
      $groupes = Groupe::where('archive_state', 0)->get();
      $eleves = Eleve::where('archive_state', 0)->get();
        return view('eleves',compact('groupes','eleves'));
    }

   public function getEleves(){
      
      $eleves = Eleve::where('archive_state', 0)->get();
     
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
        
       // return $request->all();
        
          return redirect()->route('eleves.index')
                ->with('success','Eleve created successfully.');
      }
  

    public function UpdateEleve(Request $request){
        $validateData = $request->validate([
        'groupesu'=>'required|array',
        'prenomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'nomu'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'classeu'=>'required|min:3',
        'telu'=>'required|integer|digits:8|unique:eleves,tel',
        'chku'=>'required'
        ]);
        $groupes = $validateData['groupesu'];
        $prenom = $validateData['prenomu'];
        $nom = $validateData['nomu'];
        $classe = $validateData['classeu'];
        $tel = $validateData['telu'];
        $id = $request->id;
        $eleve = Eleve::findOrfail($id);
        $eleve->prenom_eleve = $validateData['prenomu'];
        $eleve->nom_eleve = $validateData['nomu'];
        $eleve->classe = $validateData['classeu'];
        $eleve->tel = $validateData['telu'];
        $grp = $validateData['groupesu'];
        $eleve->groupes()->sync($grp);
        $eleve->save();
        
        return back()->with('success','Eleve updated successfully.');
       
      }


      public function getEleveById($id){
         $eleve = Eleve::findOrfail($id);
         $groupes = Groupe::where('archive_state', 0)->get();
         $groupeseleve = $eleve->groupes;
      
         return view('elevedetails',compact('eleve','groupes','groupeseleve'));
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
