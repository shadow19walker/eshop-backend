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

    public function ville()
    {
        return $this->hasOne(ville::class);
    }

    public function lignecommande()
    {
        return $this->hasMany(ligneCommande::class);
    }
}
