<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $table = 'seances';

    public function locataire(){
        return $this->belongsTo(locataire::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

}

