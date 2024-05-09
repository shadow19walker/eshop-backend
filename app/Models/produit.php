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

    public function categorie()
    {
        return $this->hasOne(categorie::class);
    }

    public function gestionstocks()
    {
        return $this->hasMany(gestionStock::class);
    }

    public function lignecommandes()
    {
        return $this->hasMany(ligneCommande::class);
    }

    public function lignefactures()
    {
        return $this->hasMany(ligneFacture::class);
    }

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}

