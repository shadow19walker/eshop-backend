<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;

    protected $table = 'produit';

    protected $primaryKey = 'codePro';

    public $timestamps = false;

    protected $fillable = [
        "nomPro",
        "prix",
        "qte",
        "description",
        "codeArrivage",
        "actif",
        "idCategorie",
        "prixAchat",
        "pourcentage",
        "promo",
        "size1",
        "size2",
        "typeSize",
    ];

    public function categorie()
    {
        return $this->belongsTo(categorie::class, 'idCategorie');
    }

    public function gestionstocks()
    {
        return $this->hasMany(gestionStock::class,'codePro');
    }

    public function lignecommandes()
    {
        return $this->hasMany(ligneCommande::class,'codePro');
    }

    public function lignefactures()
    {
        return $this->hasMany(ligneFacture::class,'codePro');
    }

    public function photos()
    {
        return $this->hasMany(photo::class,'codePro');
    }
}

