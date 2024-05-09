<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientCarte extends Model
{
    use HasFactory;
    protected $fillable =[
        "nom",
        "sexe",
        "dateNaiss",
        "idVille",
        "mobile",
        "whatsapp",
        "creation",
        "point",
        "montantTontine",
    ];
}
