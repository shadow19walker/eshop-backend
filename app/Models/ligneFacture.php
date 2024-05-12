<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneFacture extends Model
{
    use HasFactory;

    protected $table = 'ligneFacture';

    protected $primaryKey = 'idLFac';

    public $timestamps = false;

    protected $fillable = [
        "idFac",
        "codePro",
        "prix",
        "qte",
    ];

    public function facture()
    {
        return $this->belongsTo(facture::class,'idFac');
    }

    public function produit()
    {
        return $this->belongsTo(produit::class,'codePro');
    }
}
