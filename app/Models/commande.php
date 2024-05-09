<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $fillable = [
        "montant",
        "nomClient",
        "mobile",
        "adresse",
        "commentaire",
        "livrer",
        "avance",
        "remise",
        "type",
        "idVille",
    ];
}
