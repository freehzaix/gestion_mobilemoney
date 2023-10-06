<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_abonnement',
        'date_abonnement',
        'tarif_mensuel',
        'nombre_jour',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function operateurs(){
        return $this->hasMany(Operateur::class);
    }
    
}
