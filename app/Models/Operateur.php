<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_operateur',
        'url_operateur',
        'abonnement_id',
    ];

    public function caisses(){
        return $this->hasMany(Caisse::class);
    }

}
