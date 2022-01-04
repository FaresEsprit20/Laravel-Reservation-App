<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'eleves';

    public function factures(){
        return $this->hasMany(Facture::class);
      }

      public function groupes(){
        return $this->belongsToMany(Groupe::class,
        'groupes_eleves',
        'eleve_id',
        'groupe_id'
       );
      }

      

}
