<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        "idCommande",
        "codePro",
        "quantite",
        "taille",
        "couleur",
        "disponible",
    ];
}
