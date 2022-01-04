<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seance extends Model
{
    use HasFactory;

    protected $table = 'seances';
    protected $guarded = [];

    public function locataire(){
        return $this->belongsTo(locataire::class);
    }

    public function location(){
        return $this->belongsTo(location::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }
    
    public function eleves(){
        return $this->belongsToMany(Eleve::class,
        'seances_eleves',
        'seance_id',
        'eleve_id'
       );
      }

      public function locataires(){
        return $this->belongsToMany(Locataire::class,
        'seances_eleves',
        'seance_id',
        'locataire_id');
      }

      

}

