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
    $reservations = Reservation::all();
    return $reservations;
}

}
