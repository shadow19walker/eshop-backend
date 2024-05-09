<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;

    protected $fillable = [
        "remise",
        "tel",
        "typeFac",
        "idCaissiere",
        "capital",
        "tva",
        "codePromo",
    ];

    public function gestionnaire()
    {
        return $this->hasOne(gestionnaire::class);
    }

    public function lignecartes()
    {
        return $this->hasMany(ligneCarte::class);
    }
    public function lignefactures()
    {
        return $this->hasMany(ligneFacture::class);
    }
}
