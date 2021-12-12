<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    public function locataire(){
        return $this->belongsTo(locataire::class);
    }

    public function location(){
        return $this->belongsTo(location::class);
    }

}
