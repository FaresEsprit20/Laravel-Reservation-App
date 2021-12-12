<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $table = 'factures';

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

}
