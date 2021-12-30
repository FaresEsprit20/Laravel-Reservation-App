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
        $locataires = Locataire::all();
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

        Locataire::create($request->all());
        return redirect()->route('locataires.index')
                        ->with('success','Locataire created successfully.');
      }

      


}
