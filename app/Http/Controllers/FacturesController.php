<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Facture;
use App\Models\FactureLocataire;
use App\Models\Locataire;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturesController extends Controller
{
    public function index(){
        return view('factures');
    }

    public function PayementView(){
        return view('paiement');
    }

    public function getFactures(){
        $factures = Facture::select('*')
        ->where('archive_state', '=', 0)->get();
        return $factures;
     }

    public function PayerEleve(Request $request){
        $validateData = $request->validate([
            'seance'=>'required|integer|gt:0',
            'eleve'=>'required|integer|gt:0',
            'montant'=>'required|integer|gt:0',
            'chk'=>'required',
            ]);

            $seance = $validateData['seance'];
            $eleve = $validateData['eleve'];
            $montant = $validateData['montant'];
          
            return $request->all();      
    }

    public function PayerEnseignant(Request $request){
        $validateData = $request->validate([
            'seancee'=>'required|integer|gt:0',
            'groupee'=>'required|integer|gt:0',
            'locataire'=>'required|integer|gt:0',
            'montante'=>'required|integer|gt:0',
            'chke'=>'required',
            ]);

            $seance = $validateData['seancee'];
            $groupe = $validateData['groupee'];
            $locataire = $validateData['locataire'];
            $montant = $validateData['montante'];
          
            return $request->all();      
    }


    public function FacturerGroupe(Request $request){
        $validateData = $request->validate([
            'groupeg'=>'required|integer|gt:0',
            'prixunitaire'=>'required|integer|gt:0',
            'chkg'=>'required',
            ]);

            $groupe = $validateData['groupeg'];
            $prixunitaire = $validateData['prixunitaire'];
          
            return $request->all();      
    }


    public function getFactureById($id){
        $facture = Facture::findOrfail($id);
        $eleve_id = $facture->eleve_id;
        $eleve = Eleve::find($eleve_id);
        $seanceseleve = DB::table('factures_seances_eleves')
        ->leftJoin('seances','seances.id', '=','factures_seances_eleves.seance_id' )
        ->leftJoin('seances_eleves','seances_eleves.seance_id', '=','seances.id' )
        ->where('factures_seances_eleves.facture_id', '=',$id )
        ->where('seances_eleves.eleve_id', '=',$eleve_id )
        ->get();
       
        return view('facturedetails',compact('facture','seanceseleve'));
     }


     public function getFactureProfesseurById($id){
        $facture = FactureLocataire::findOrfail($id);
        $locataire_id = $facture->locataire_id;
        $locataire = Locataire::find($locataire_id);
        $seanceslocataires = DB::table('factures_seances_locataires')
        ->leftJoin('seances','seances.id', '=','factures_seances_locataires.seance_id' )
        ->leftJoin('seances_locataires','seances_locataires.seance_id', '=','seances.id' )
        ->where('factures_seances_locataires.facture_id', '=',$id )
        ->where('seances_locataires.locataire_id', '=',$locataire_id )
        ->get();
       
        return view('facturedetailsprof',compact('facture','seanceslocataires'));
     }
  

    public function FacturerEnseignants(Request $request){
        $validateData = $request->validate([
            'groupeens'=>'required|integer|gt:0',
            'loc'=>'required|integer|gt:0',
            'prixUens'=>'required|integer|gt:0',
            'chkens'=>'required',
            ]);

            $groupe = $validateData['groupeens'];
            $locataire = $validateData['loc'];
            $prixunitaire = $validateData['prixUens'];
          
            return $request->all();      
    }


}
