<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'frais',
        'details',
        'dateHeure',
        'type',
        'client_id',
        'abonnement_id',
        'caisse_id',
    ];

}
