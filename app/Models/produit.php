<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;

    protected $fillable = [
        "nompro",
        "prix",
        "qte",
        "description",
        "codeArrivage",
        "actif",
        "idCategorie",
        "dateInsertion",
        "prixAchat",
        "pourcentage",
        "promo",
        "size1",
        "size2",
        "typeSize",
    ];
}
