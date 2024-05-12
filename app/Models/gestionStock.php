<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestionStock extends Model
{
    use HasFactory;

    protected $table = 'gestionStock';

    protected $primaryKey = 'idStock';

    public $timestamps = false;


    protected $fillable = [
        "qte",
        "operation",
        "idGest",
        "codePro",
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(gestionnaire::class,'idGest');
    }

    public function produit()
    {
        return $this->hasOne(produit::class,'codePro');
    }
}
