<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tontine extends Model
{
    use HasFactory;

    protected $fillable = [
        "dateCotisation",
        "montant",
        "commentaire",
        "idGest",
        "validite",
        "idCarte",
        "action"
    ];
}