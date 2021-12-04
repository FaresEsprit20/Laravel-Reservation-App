<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatairesController extends Controller
{
    public function index(){
        return view('locataires');
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
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $cin = $request->input('cin');
        $ville = $request->input('ville');
        $rue = $request->input('rue');
        $postal = $request->input('postal');
        $email = $request->input('email');
        $tel = $request->input('tel');
        return $request->all();
      }

}
