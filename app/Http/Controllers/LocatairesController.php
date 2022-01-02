<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocatairesController extends Controller
{
    public function index(){
        return view('locataires');
    }

    public function getLocataires(){
        $locataires = Locataire::select('*')
        ->where('archive_state', '=', 0)->get();
        return $locataires;
    }

    public function professeursView(){
        return view('professeurs');
    }

    public function CreateProfesseur(Request $request){
        $validateData = $request->validate([
        'nom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'prenom'=>'required|regex:/^[a-zA-ZÑñ\s]+$/|max:30',
        'cin'=>'required|integer|digits:8',
        'ville'=>'required|min:3|max:50|regex:/^[a-zA-ZÑñ\s]',
        'rue'=>'required|min:3|max:50',
        'postal'=>'required|integer/digits:4',
        'email'=>'required|email:rfc',
        'tel'=>'required|integer|digits:8',
        'chk'=>'required',
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
        $locataire->nom = $nom;
        $locataire->prenom = $prenom;
        $locataire->cin = $cin;
        $locataire->ville = $ville;
        $locataire->rue = $rue;
        $locataire->postal = $postal;
        $locataire->email = $email;
        $locataire->tel = $tel;
        $locataire->save();

        return redirect()->route('locataires.index')
                        ->with('success','Locataire created successfully.');
      }

      


}
