<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class influenceur extends Model
{
    use HasFactory;

    protected $table = 'influenceur';

    protected $primaryKey = 'idInf';

    public $timestamps = false;


    protected $fillable = [
        "nom",
        "mobile",
        "codePromo",
        "actif",
        "montant",
        "pwd",
    ];

    public function paieinfluenceurs()
    {
        return $this->hasMany(paieInfluenceur::class,'idInf');
    }
}
