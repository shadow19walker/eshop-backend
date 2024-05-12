<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientCarte extends Model
{
    use HasFactory;

    protected $table = 'clientCarte';

    protected $primaryKey = 'matr';

    public $timestamps = false;

    protected $fillable =[
        "nom",
        "sexe",
        "dateNaiss",
        "idVille",
        "mobile",
        "whatsapp",
        "point",
        "montantTontine",
    ];

    public function tontines()
    {
        return $this->hasMany(tontine::class,'idCarte');
    }

    public function lignecartes()
    {
        return $this->hasMany(ligneCarte::class,'idCarte');
    }
    public function ville()
    {
        return $this->belongsTo(ville::class,'idVille');
    }
}
