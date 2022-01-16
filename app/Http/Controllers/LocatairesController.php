<?php

namespace App\Http\Controllers;

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
        ->where('seances.archive_state','=',0)
        ->get();
        $factures = FactureLocataire::select('*')
        ->where('archive_state', 0)
        ->where('locataire_id', $id)
        ->get();

      
        return view('professeurdetails',compact('locataire','groupeslocataire','seanceslocataire'));
     }

     public function UpdateProfesseur(Request $request){
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
        $eleve = Locataire::findOrfail($id);
        $eleve->prenom_eleve = $validateData['prenomu'];
        $eleve->nom_eleve = $validateData['nomu'];
        $eleve->classe = $validateData['classeu'];
        $eleve->tel = $validateData['telu'];
        $grp = $validateData['groupesu'];
        $eleve->groupes()->sync($grp);
        $eleve->save();
        
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
              $affected = DB::table('seances_locataire')
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
        'email'=> ['required','email:rfc'],
        'tel'=> ['required','integer','digits:8','unique:locataires,tel'],
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
