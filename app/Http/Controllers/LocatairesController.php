<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\FactureLocataire;
use App\Models\Groupe;
use App\Models\Locataire;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LocatairesController extends Controller
{
    public function index(){
        $locataires =  Locataire::select('*')
        ->where('archive_state', '=', 0)->get();

        return view('professeurs',compact('locataires'));
    }

    public function getLocataires(){
        $locataires = Locataire::select('*')
        ->where('archive_state', '=', 0)->get();
        return $locataires;
    }

    public function professeursView(){
        $locataires =  Locataire::select('*')
        ->where('archive_state', '=', 0)->get();

        return view('professeurs',compact('locataires'));
    }

    public function getProfesseurById($id){
        $locataire = Locataire::findOrfail($id);
        $groupes = Groupe::where('archive_state', 0)->get();
        $groupeslocataire = Groupe::select('groupes.id','groupes.group_name')
        ->leftJoin('seances','seances.groupe_id','=','groupes.id')
        ->where('seances.locataire_id','=',$id)
        ->where('groupes.archive_state','=',0)
        ->groupBy('groupes.id')
        ->get();
        $seanceslocataire = Seance::select('*')
        ->leftJoin('seances_locataires','seances_locataires.id','=','seances.id')
        ->where('seances.locataire_id',$id)
        ->where('seances.archive_state',0)
        ->where('seances_locataires.archive_state',0)
        ->get();
        $factures = FactureLocataire::select('*')
        ->where('archive_state', 0)
        ->where('locataire_id', $id)
        ->get();

      
        return view('professeurdetails',compact('locataire','groupeslocataire','seanceslocataire','factures'));
     }



     public function FacturerProfesseur(Request $request) {
      $validateData = $request->validate([
         'ides'=>'required|integer|gt:0',
         'groupeslocataire'=>'required|integer|gte:0',
         'datedeb'=>'bail|required|date|date_format:Y-m-d',
         'datefin'=>'bail|required|date|date_format:Y-m-d|after_or_equal:datedeb',
         'absence'=>'required',
         'chkf'=>'required'
         ]);

          $facture = new FactureLocataire();

          if($validateData['absence']=="on"){

            if($validateData['groupeslocataire']=="0"){
               $payementTotal =  DB::table('seances_locataires')
               ->leftJoin('seances', 'seances.id', '=', 'seances_locataires.seance_id')
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('payement');
  
               $Total =  DB::table('seances')
                ->leftJoin('seances_locataires', 'seances_locataires.seance_id','=', 'seances.id')
                ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('prixUnitaire');
  
               $seances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->get();
  
               $InedexedLocataire = Locataire::findOrfail($validateData['ides']);
               $Indexedseances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->pluck('seance_id');


               $facture->prixTotalseances = $Total;
               $facture->paid = $payementTotal;
               $facture->toPay = $Total-$payementTotal;
               $facture->datedeb = $validateData['datedeb'];
               $facture->datefin = $validateData['datefin'];
               $facture->locataire()->associate($InedexedLocataire);
               $facture->save();
              
              $facture->seances()->attach($Indexedseances);  
          
            
            }else {
               $payementTotal =  DB::table('seances_locataires')
               ->leftJoin('seances', 'seances.id', '=', 'seances_locataires.seance_id')
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('payement');
  
               $Total =  DB::table('seances')
                ->leftJoin('seances_locataires', 'seances_locataires.seance_id','=', 'seances.id')
                ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('prixUnitaire');
  
               $seances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->get();
  
               $InedexedLocataire = Locataire::findOrfail($validateData['ides']);
               $Indexedseances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->pluck('seance_id');

               $facture->prixTotalseances = $Total;
               $facture->paid = $payementTotal;
               $facture->toPay = $Total-$payementTotal;
               $facture->datedeb = $validateData['datedeb'];
               $facture->datefin = $validateData['datefin'];
               $facture->locataire()->associate($InedexedLocataire);
               $facture->save();
              
               $facture->seances()->attach($Indexedseances);  
          
            }
          

          }else{

            if($validateData['groupeslocataire']=="0"){
         
               $payementTotal =  DB::table('seances_locataires')
               ->leftJoin('seances', 'seances.id', '=', 'seances_locataires.seance_id')
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances_locataires.absent', '=', 0)
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('payement');
  
               $Total =  DB::table('seances')
                ->leftJoin('seances_locataires', 'seances_locataires.seance_id','=', 'seances.id')
                ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances_locataires.absent', '=', 0)
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('prixUnitaire');
  
               $seances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances_locataires.absent', '=', 0)
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->get();
  
               $InedexedLocataire = Locataire::findOrfail($validateData['ides']);
               $Indexedseances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances_locataires.absent', '=', 0)
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->pluck('seance_id');

               $facture->prixTotalseances = $Total;
               $facture->paid = $payementTotal;
               $facture->toPay = $Total-$payementTotal;
               $facture->datedeb = $validateData['datedeb'];
               $facture->datefin = $validateData['datefin'];
               $facture->locataire()->associate($InedexedLocataire);
               $facture->save();
              
              $facture->seances()->attach($Indexedseances);  

            }else {
               $payementTotal =  DB::table('seances_locataires')
               ->leftJoin('seances', 'seances.id', '=', 'seances_locataires.seance_id')
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances_locataires.absent', '=', 0)
                ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('payement');
  
               $Total =  DB::table('seances')
                ->leftJoin('seances_locataires', 'seances_locataires.seance_id','=', 'seances.id')
                ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
                ->where('seances_locataires.archive_state', '=', 0)
                ->where('seances_locataires.absent', '=', 0)
                ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
                ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
                ->sum('prixUnitaire');
  
               $seances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances_locataires.absent', '=', 0)
               ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->get();
  
               $InedexedLocataire = Locataire::findOrfail($validateData['ides']);
               $Indexedseances = Seance::select('*')
               ->leftJoin('seances_locataires', 'seances_locataires.seance_id', '=','seances.id' )
               ->where('seances_locataires.locataire_id', '=', $validateData['ides'])
               ->where('seances_locataires.archive_state', '=', 0)
               ->where('seances_locataires.absent', '=', 0)
               ->where('seances.groupe_id', '=', $validateData{'groupeslocataire'})
               ->whereBetween('seances.date',[$validateData['datedeb'],$validateData['datefin']])
               ->pluck('seance_id');

               $facture->prixTotalseances = $Total;
               $facture->paid = $payementTotal;
               $facture->toPay = $Total-$payementTotal;
               $facture->datedeb = $validateData['datedeb'];
               $facture->datefin = $validateData['datefin'];
               $facture->locataire()->associate($InedexedLocataire);
               $facture->save();
              
              $facture->seances()->attach($Indexedseances);  
            }

            return $seances;
            //return back();
          }

         
          
        
          


           //return $request->all();


         // return back();

   }

     public function UpdateProfesseur(Request $request){
        $validateData = $request->validate([
         'id'=>'required|integer|gt:0',
         'nom'=> ['required','regex:/^[a-zA-Z\s]+$/','max:30'],
         'prenom'=> ['required','regex:/^[a-zA-Z\s]+$/','max:30'],
         'cin'=> ['required','regex:/^[0-9\s]+$/','min:8','max:8'],
         'ville'=> ['required','min:3','max:50','regex:/^[a-zA-Z\s]+$/'],
         'rue'=> ['required','min:3','max:50'],
         'postal'=> ['required','integer','digits:4'],
         'email'=> ['required','email:rfc'],
         'tel'=> ['required','integer','digits:8'],
         'chk'=> ['required']
        ]);
       
        $id = $request->id;
        $locataire = Locataire::findOrfail($id);
        $locataire->nom_locataire = $validateData['nom'];
        $locataire->prenom_locataire = $validateData['prenom'];
        $locataire->cin = $validateData['cin'];
        $locataire->ville = $validateData['ville'];
        $locataire->rue = $validateData['rue'];
        $locataire->codepostal = $validateData['postal'];
        $locataire->email = $validateData['email'];
        $locataire->tel = $validateData['tel'];
    
        $locataire->save();
        
        return back()->with('success','Locataire updated successfully.');
       
      }


      public function editSeanceLocataire($idlocataire,$idseance){
       
        $locataire = $idlocataire;
        $seance = $idseance;
        $sc = Seance::findOrfail($idseance);
        $prix = $sc->prixUnitaire;

        return view('payerseancelocataire',compact('locataire','seance','prix'));
     }

     public function updateSeanceLocataire(Request $request){
       
        $validateData = $request->validate([
           'locataire'=>'required|integer|gt:0',
           'seance'=>'required|integer|gt:0',
           'prix'=>'required|integer|gt:0',
           'montant'=>'required|integer|gt:0',
           'chk'=>'required'
           ]);

           $affected = DB::table('seances_locataires')
             ->where('locataire_id', $validateData['locataire'])
             ->where('seance_id', $validateData['seance'])
             ->update(['payement' => $validateData['montant']]);

           if($validateData['montant'] == $validateData['prix']){
              $affected = DB::table('seances_locataires')
              ->where('locataire_id', $validateData['locataire'])
              ->where('seance_id', $validateData['seance'])
              ->update(['archive_state' => 1 ]);
           }

             return back()->with('success','Locataire Seance paid successfully.');
     }

     public function setLocatairePresent($idlocataire,$idseance){
        $affected = DB::table('seances_locataires')
        ->where('locataire_id', $idlocataire)
        ->where('seance_id', $idseance)
        ->update(['absent' => 0]);
        return back();
     }

     public function setLocataireAbsent($idlocataire,$idseance){
        $affected = DB::table('seances_locataires')
        ->where('locataire_id', $idlocataire)
        ->where('seance_id', $idseance)
        ->update(['absent' => 1]);
        return back();
     }

    public function CreateProfesseur(Request $request){
        $validateData = $request->validate([
        'nom'=> ['required','regex:/^[a-zA-Z\s]+$/','max:30'],
        'prenom'=> ['required','regex:/^[a-zA-Z\s]+$/','max:30'],
        'cin'=> ['required','regex:/^[0-9\s]+$/','unique:locataires,cin','min:8','max:8'],
        'ville'=> ['required','min:3','max:50','regex:/^[a-zA-Z\s]+$/'],
        'rue'=> ['required','min:3','max:50'],
        'postal'=> ['required','integer','digits:4'],
        'email'=> ['required','email:rfc','unique:locataires,email',],
        'tel'=> ['required','integer','digits:8','unique:locataires,tel','unique:eleves,tel'],
        'chk'=> ['required']
        ]);
        $nom = $validateData['nom'];
        $prenom = $validateData['prenom'];
        $cin = $validateData['cin'];
        $ville = $validateData['ville'];
        $rue = $validateData['rue'];
        $postal = $validateData['postal'];
        $email = $validateData['email'];
        $tel = $validateData['tel'];

        $locataire = new Locataire();
        $locataire->nom_locataire = $nom;
        $locataire->prenom_locataire = $prenom;
        $locataire->cin = $cin;
        $locataire->ville = $ville;
        $locataire->rue = $rue;
        $locataire->codepostal = $postal;
        $locataire->email = $email;
        $locataire->tel = $tel;
        $locataire->save();

        return redirect()->route('professeurs.index')
                        ->with('success','Locataire created successfully.');
      }

      


}
