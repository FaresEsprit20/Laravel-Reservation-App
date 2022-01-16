<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $table = 'locataires';
    protected $guarded = [];

    public function reservations(){
        return $this->hasMany(Reservation::class);
      }

      public function factures(){
        return $this->belongsToMany(Facture::class,
        'factures_seances_locataires',
        'locataire_id',
        'facture_id');
      }

      public function seances(){
        return $this->belongsToMany(Locataire::class,
        'seances_locataires',
        'locataire_id',
        'seance_id'
        
       )->withPivot('absent', 'payement');
      }

}
