<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestionnaire extends Model
{
    use HasFactory;

    protected $table = 'gestionnaire';

    protected $primaryKey = 'idGest';

    public $timestamps = false;


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
        return $this->hasMany(gestionStock::class, 'idGest');
    }

    public function factures()
    {
        return $this->hasMany(facture::class,'idCaissiere');
    }

    public function tontines()
    {
        return $this->hasMany(tontine::class,'idGest');
    }
}
