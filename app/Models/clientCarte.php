<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientCarte extends Model
{
    use HasFactory;

    protected $table = 'clientCarte';

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

    public function tontines()
    {
        return $this->hasMany(tontine::class);
    }

    public function lignecartes()
    {
        return $this->hasMany(ligneCarte::class);
    }
    public function ville()
    {
        return $this->hasOne(ville::class);
    }
}
