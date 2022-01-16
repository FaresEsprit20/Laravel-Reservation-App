<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $table = 'factures';
    protected $guarded = [];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
      }

      public function seances(){
        return $this->belongsToMany(Eleve::class,
        'factures_seances_eleves',
        'facture_id',
        'seance_id'
       );
      }

     

}
