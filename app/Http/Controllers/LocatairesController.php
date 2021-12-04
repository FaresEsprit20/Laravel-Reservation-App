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
        'cin'=>'required|numeric/[min:8|max:8',
        'ville'=>'required|max:50|regex:/^[a-zA-ZÑñ\s]',
        'rue'=>'required|max:50',
        'postal'=>'required|numeric/[min:4|max:4',
        'email'=>'required|email:rfc',
        'tel'=>'required|numeric/[min:8|max:8',
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
