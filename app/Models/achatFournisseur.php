<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatFournisseur extends Model
{
    use HasFactory;

    protected $table = 'achatFournisseur';

    protected $fillable = [
        "lienFac",
        "montantFac",
        "montantCargo",
        "totalKg",
        "montantGlobal",
        "idFour",
        "idCargo",
    ];

    public function fournisseur()
    {
        return $this->hasOne(fournisseur::class);
    }
}
