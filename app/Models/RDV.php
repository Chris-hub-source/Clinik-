<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RDV extends Model
{

    use HasFactory;

    protected $fillable = [
        'date_rdv',
        'heure_rdv',
        'statut',
        'motif',
        'user_id',
        'medecin_id'
    ];
   
    public function patient() {
    return $this->belongsTo(User::class, 'user_id');
}

public function medecin() {
    return $this->belongsTo(User::class, 'medecin_id');
}
}
