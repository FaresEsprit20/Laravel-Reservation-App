<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
   public function index(){
       $title = 'reservation app';
       return view('reservations',compact('title'));
   }
}
