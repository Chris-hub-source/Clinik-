<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RDV extends Model
{

    use HasFactory;

    protected $fillable = [
        'date',
        'durée',
        'statut',
        'motif',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
