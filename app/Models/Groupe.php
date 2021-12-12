<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $table = 'groupes';

    public function seances(){
        return $this->hasMany(Seance::class);
      }

      public function factures(){
        return $this->hasMany(Facture::class);
      }

}
