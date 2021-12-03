<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupesController extends Controller
{
    public function index(){
        return view('groupes');
    }
}
