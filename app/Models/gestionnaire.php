<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomGest",
        "typeGest",
        "login",
        "pwd",
        "actif",
        "mobile",
    ];

    public function gestionstocks()
    {
        return $this->hasMany(gestionStock::class);
    }

    public function factures()
    {
        return $this->hasMany(facture::class);
    }

    public function tontines()
    {
        return $this->hasMany(tontine::class);
    }
}
