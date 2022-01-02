<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    
   public function index(){
       $title = 'reservation app';
       return view('reservations',compact('title'));
   }

   public function getReservations(){
       $reservations = Reservation::select('*')
       ->where('archive_state', '=', 0)->get();
       return $reservations;
  }


}
