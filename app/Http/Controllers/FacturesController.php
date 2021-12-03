<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function index(){
        return view('factures');
    }
}
