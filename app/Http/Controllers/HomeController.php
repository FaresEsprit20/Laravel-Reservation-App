<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Groupe;
use App\Models\Locataire;
use App\Models\Seance;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
	{
	    $this->middleware('auth');
	}
    
    public function index(){
        $IndexedSeances = Seance::where('archive_state',0)->count();
        $IndexedSeancesarchv = Seance::where('archive_state',1)->count();
        
        $IndexedLocataires = Locataire::where('archive_state',0)->count();
        $IndexedLocatairesarchv = Locataire::where('archive_state',1)->count();

        $IndexedEleves = Eleve::where('archive_state',0)->count();
        $IndexedElevesarchv = Eleve::where('archive_state',1)->count();

        $IndexedGroupes = Groupe::where('archive_state',0)->count();
        $IndexedGroupesarchv = Groupe::where('archive_state',1)->count();

        return view('home',compact('IndexedSeances','IndexedSeancesarchv','IndexedLocataires','IndexedLocatairesarchv','IndexedEleves','IndexedElevesarchv','IndexedGroupes','IndexedGroupesarchv'));
    }

    

}
