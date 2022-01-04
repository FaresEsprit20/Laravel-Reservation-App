<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $table = 'groupes';
    protected $guarded = [];

    public function seances(){
        return $this->hasMany(Seance::class);
      }

      public function eleves(){
        return $this->belongsToMany(Eleve::class,
        'groupes_eleves',
        'groupe_id',
        'eleve_id');
      }

      public function factures(){
        return $this->hasMany(Facture::class);
      }

}
