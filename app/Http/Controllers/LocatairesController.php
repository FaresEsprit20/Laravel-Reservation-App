<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
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
        return view('professeurdetails',compact('locataire'));
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
