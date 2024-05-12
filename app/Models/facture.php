<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;

    protected $table = 'facture';

    protected $primaryKey = 'idFac';

    public $timestamps = false;

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
        return $this->belongsTo(gestionnaire::class, 'idCaissiere');
    }

    public function lignecartes()
    {
        return $this->hasMany(ligneCarte::class,'idFac');
    }
    public function lignefactures()
    {
        return $this->hasMany(ligneFacture::class,'idFac');
    }
}
