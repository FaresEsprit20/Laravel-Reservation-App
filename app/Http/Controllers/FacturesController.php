<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

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
        return view('facturedetails',compact('facture'));
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
