<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneCommande extends Model
{
    use HasFactory;

    protected $table = 'ligneCommande';

    protected $primaryKey = 'idLigneCom';

    public $timestamps = false;

    protected $fillable = [
        "idCommande",
        "codePro",
        "quantite",
        "taille",
        "couleur",
        "disponible",
    ];

    public function commade()
    {
        return $this->belongsTo(commande::class,'idCommande');
    }

    public function produit()
    {
        return $this->belongsTo(produit::class,'codePro');
    }
}
