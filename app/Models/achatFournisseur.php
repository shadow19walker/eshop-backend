<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatFournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        "lienFac",
        "dateInsertion",
        "montantFac",
        "montantCargo",
        "totalKg",
        "montantGlobal",
        "idFour",
        "idCargo",
    ];
}
