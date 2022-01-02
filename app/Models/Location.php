<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    protected $table = 'locations';
    protected $guarded = [];

  public function reservations(){
    return $this->hasMany(Reservation::class);
  }

  public function seances(){
    return $this->hasMany(Seance::class);
  }
    

}
