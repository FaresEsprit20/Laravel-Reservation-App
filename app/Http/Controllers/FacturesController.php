<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function index(){
        return view('factures');
    }

    public function PayementView(){
        return view('paiement');
    }

    public function PayerEleve(Request $request){
        $validateData = $request->validate([
            'seance'=>'required|integer|gt:0',
            'eleve'=>'required|integer|gt:0',
            'montant'=>'required|integer|gt:0',
            'chk'=>'required',
            ]);

            $seance = $request->input('seance');
            $eleve = $request->input('eleve');
            $montant = $request->input('montant');
          
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

            $seance = $request->input('seancee');
            $groupe = $request->input('groupee');
            $locataire = $request->input('locataire');
            $montant = $request->input('montante');
          
            return $request->all();      
    }


    public function FacturerGroupe(Request $request){
        $validateData = $request->validate([
            'groupeg'=>'required|integer|gt:0',
            'prixunitaire'=>'required|integer|gt:0',
            'chkg'=>'required',
            ]);

            $groupe = $request->input('groupeg');
            $prixunitaire = $request->input('prixunitaire');
          
            return $request->all();      
    }


    public function FacturerEnseignants(Request $request){
        $validateData = $request->validate([
            'groupeens'=>'required|integer|gt:0',
            'loc'=>'required|integer|gt:0',
            'prixUens'=>'required|integer|gt:0',
            'chkens'=>'required',
            ]);

            $groupe = $request->input('groupeens');
            $locataire = $request->input('loc');
            $prixunitaire = $request->input('prixUens');
          
            return $request->all();      
    }


}
