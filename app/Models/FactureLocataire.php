<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureLocataire extends Model
{
    use HasFactory;
    protected $table = 'factures_locataires';
    protected $guarded = [];


    public function locataires(){
        return $this->belongsToMany(Locataire::class,
        'factures_seances_locataires',
        'facture_id',
        'locataire_id');
      }

}
