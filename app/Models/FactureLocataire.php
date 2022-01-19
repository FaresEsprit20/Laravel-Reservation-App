<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureLocataire extends Model
{
    use HasFactory;
    protected $table = 'factures_locataires';
    protected $guarded = [];


    public function locataire(){
        return $this->belongsTo(Locataire::class);
      }

      public function seances(){
        return $this->belongsToMany(Seance::class,
        'factures_seances_locataires',
        'facture_id',
        'seance_id'
       );
      }

}
