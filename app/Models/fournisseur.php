<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "adresse",
        "ville",
        "pays",
        "mobile1",
        "mobile2",
        "dateCreation",
        "type",
    ];
}
