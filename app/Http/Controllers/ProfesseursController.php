<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesseursController extends Controller
{
    public function index(){
        return view('professeurs');
    }
}
