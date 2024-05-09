<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneFacture extends Model
{
    use HasFactory;

    protected $fillable = [
        "idFac",
        "codePro",
        "prix",
        "qte",
    ];

    public function facture()
    {
        return $this->hasOne(facture::class);
    }

    public function produit()
    {
        return $this->hasOne(produit::class);
    }
}
