<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatairesController extends Controller
{
    public function index(){
        return view('locataires');
    }
}
