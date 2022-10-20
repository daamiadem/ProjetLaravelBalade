<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'NomParticipant',
        'PrenomParticipant',
        'MailParticipant',
        'EtatPhysique',
        'imageParticipant', 
        'numParticipant', 
        'AgeParticipant',
        'balade_id'
    ];
    public function balade(){
        return $this-> belongsTo(Balade::class , 'balade_id','id'); 
    }

}
