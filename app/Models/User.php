<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'specialite',
        'email',
        'telephone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function disponibilites()
    {
        return $this->hasMany(Disponibilite::class);
    }

    

    public static function listSpecialites()
{
    return [
        'Generaliste' => 'Médecin Généraliste',
        'Cardiologue' => 'Cardiologue',
        'Pediatre'    => 'Pédiatre',
        'Gynecologue' => 'Gynécologue',
        'Dentiste'    => 'Dentiste',
    ];
}

public function rdvsPris()
{
    return $this->hasMany(RDV::class, 'user_id');
}

// Les rendez-vous que l'utilisateur doit honorer (en tant que MÉDECIN)
public function rdvsRecus()
{
    return $this->hasMany(RDV::class, 'medecin_id');
}

}

