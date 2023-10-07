<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_caisse',
        'montant_caisse',
        'taux_caisse',
        'operateur_id',
        'abonnement_id',
    ];

    public function operateurs(){
        return $this->belongsTo(Operateur::class);
    }

}
