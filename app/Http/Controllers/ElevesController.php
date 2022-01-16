<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Facture;
use App\Models\Groupe;
use App\Models\Seance;
use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
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


      public function updateSeanceEleve(Request $request){
       
         $validateData = $request->validate([
            'eleve'=>'required|integer|gt:0',
            'seance'=>'required|integer|gt:0',
            'prix'=>'required|integer|gt:0',
            'montant'=>'required|integer|gt:0',
            'chk'=>'required'
            ]);

            $affected = DB::table('seances_eleves')
              ->where('eleve_id', $validateData['eleve'])
              ->where('seance_id', $validateData['seance'])
              ->update(['payement' => $validateData['montant']]);

            if($validateData['montant'] == $validateData['prix']){
               $affected = DB::table('seances_eleves')
               ->where('eleve_id', $validateData['eleve'])
               ->where('seance_id', $validateData['seance'])
               ->update(['archive_state' => 1 ]);
            }

              return back()->with('success','Eleve Seance paid successfully.');
      }

      public function editSeanceEleve($ideleve,$idseance){
       
         $eleve = $ideleve;
         $seance = $idseance;
         $sc = Seance::findOrfail($idseance);
         $prix = $sc->prixUnitaire;

         return view('payerseanceeleve',compact('eleve','seance','prix'));
      }

      public function setElevePresent($ideleve,$idseance){
         $affected = DB::table('seances_eleves')
         ->where('eleve_id', $ideleve)
         ->where('seance_id', $idseance)
         ->update(['absent' => 0]);
         return back();
      }

      public function setEleveAbsent($ideleve,$idseance){
         $affected = DB::table('seances_eleves')
         ->where('eleve_id', $ideleve)
         ->where('seance_id', $idseance)
         ->update(['absent' => 1]);
         return back();
      }

      public function FacturerEleve(Request $request) {
         $validateData = $request->validate([
            'ide'=>'required|integer|gt:0',
            'groupeseleves'=>'required|integer|gte:0',
            'datedeb'=>'bail|required|date|date_format:Y-m-d',
            'datefin'=>'bail|required|date|date_format:Y-m-d|after_or_equal:datedeb',
            'absence'=>'required',
            'chkf'=>'required'
            ]);

             $facture = new Facture();

             if($validateData['absence']=="on"){

               if($validateData['groupeseleves']=="0"){
                  $payementTotal =  DB::table('seances_eleves')
                  ->leftJoin('seances', 'seances.id', '=', 'seances_eleves.seance_id')
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('payement');
     
                  $Total =  DB::table('seances')
                   ->leftJoin('seances_eleves', 'seances_eleves.seance_id','=', 'seances.id')
                   ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('prixUnitaire');
     
                  $seances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->get();
     
                  $InedexedEleve = Eleve::findOrfail($validateData['ide']);
                  $Indexedseances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->pluck('seance_id');
   
                  $facture->prixTotalseances = $Total;
                  $facture->paid = $payementTotal;
                  $facture->toPay = $Total-$payementTotal;
                  $facture->datedeb = $validateData['datedeb'];
                  $facture->datefin = $validateData['datefin'];
                  $facture->eleve()->associate($InedexedEleve);
                  $facture->save();
                 
                 $facture->seances()->attach($Indexedseances);  
             
               
               }else {
                  $payementTotal =  DB::table('seances_eleves')
                  ->leftJoin('seances', 'seances.id', '=', 'seances_eleves.seance_id')
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('payement');
     
                  $Total =  DB::table('seances')
                   ->leftJoin('seances_eleves', 'seances_eleves.seance_id','=', 'seances.id')
                   ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('prixUnitaire');
     
                  $seances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->get();
     
                  $InedexedEleve = Eleve::findOrfail($validateData['ide']);
                  $Indexedseances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->pluck('seance_id');
   
                  $facture->prixTotalseances = $Total;
                  $facture->paid = $payementTotal;
                  $facture->toPay = $Total-$payementTotal;
                  $facture->datedeb = $validateData['datedeb'];
                  $facture->datefin = $validateData['datefin'];
                  $facture->eleve()->associate($InedexedEleve);
                  $facture->save();
                 
                 $facture->seances()->attach($Indexedseances);  
             
             
               }
             

             }else{

               if($validateData['groupeseleves']=="0"){
            
                  $payementTotal =  DB::table('seances_eleves')
                  ->leftJoin('seances', 'seances.id', '=', 'seances_eleves.seance_id')
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.absent', '=', 0)
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('payement');
     
                  $Total =  DB::table('seances')
                   ->leftJoin('seances_eleves', 'seances_eleves.seance_id','=', 'seances.id')
                   ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.absent', '=', 0)
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('prixUnitaire');
     
                  $seances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances_eleves.absent', '=', 0)
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->get();
     
                  $InedexedEleve = Eleve::findOrfail($validateData['ide']);
                  $Indexedseances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances_eleves.absent', '=', 0)
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->pluck('seance_id');
   
                  $facture->prixTotalseances = $Total;
                  $facture->paid = $payementTotal;
                  $facture->toPay = $Total-$payementTotal;
                  $facture->datedeb = $validateData['datedeb'];
                  $facture->datefin = $validateData['datefin'];
                  $facture->eleve()->associate($InedexedEleve);
                  $facture->save();
                 
                 $facture->seances()->attach($Indexedseances);  

               }else {
                  $payementTotal =  DB::table('seances_eleves')
                  ->leftJoin('seances', 'seances.id', '=', 'seances_eleves.seance_id')
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.absent', '=', 0)
                   ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('payement');
     
                  $Total =  DB::table('seances')
                   ->leftJoin('seances_eleves', 'seances_eleves.seance_id','=', 'seances.id')
                   ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                   ->where('seances_eleves.archive_state', '=', 0)
                   ->where('seances_eleves.absent', '=', 0)
                   ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                   ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                   ->sum('prixUnitaire');
     
                  $seances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances_eleves.absent', '=', 0)
                  ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->get();
     
                  $InedexedEleve = Eleve::findOrfail($validateData['ide']);
                  $Indexedseances = Seance::select('*')
                  ->leftJoin('seances_eleves', 'seances_eleves.seance_id', '=','seances.id' )
                  ->where('seances_eleves.eleve_id', '=', $validateData['ide'])
                  ->where('seances_eleves.archive_state', '=', 0)
                  ->where('seances_eleves.absent', '=', 0)
                  ->where('seances.groupe_id', '=', $validateData{'groupeseleves'})
                  ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                  ->pluck('seance_id');
   
                  $facture->prixTotalseances = $Total;
                  $facture->paid = $payementTotal;
                  $facture->toPay = $Total-$payementTotal;
                  $facture->datedeb = $validateData['datedeb'];
                  $facture->datefin = $validateData['datefin'];
                  $facture->eleve()->associate($InedexedEleve);
                  $facture->save();
                 
                 $facture->seances()->attach($Indexedseances);  
               }

               return $seances;
               //return back();
             }
 
            
             
           
             


              //return $request->all();


            // return back();

      }

      public function getEleveById($id){
         $eleve = Eleve::findOrfail($id);
         $groupes = Groupe::where('archive_state', 0)->get();
         $groupeseleve = $eleve->groupes;
         $seanceseleve = $eleve->seances;

         return view('elevedetails',compact('eleve','groupes','groupeseleve','seanceseleve'));
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
