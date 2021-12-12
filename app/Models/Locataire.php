<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $table = 'locataires';

    public function reservations(){
        return $this->hasMany(Reservation::class);
      }

    public function seances(){
        return $this->hasMany(Seance::class);
      }

}
