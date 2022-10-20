<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balade extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleBalade',
        'descriptionBalade',
        'dateBalade',
        'capaciteBalade',
        'imageDescBalade', 
        'MoyensBalade', 
        'Destination', 
    ];


    public function ParticipantBalade(){
        return $this->hasMany(Participant::class,'balade_id', 'id' ); 
    }


}
