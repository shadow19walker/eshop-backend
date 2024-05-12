<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tontine extends Model
{
    use HasFactory;

    protected $table = 'tontine';

    protected $primaryKey = 'idTontine';

    public $timestamps = false;


    protected $fillable = [
        "montant",
        "commentaire",
        "idGest",
        "validite",
        "idCarte",
        "action"
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(gestionnaire::class,'idGest');
    }

    public function cliencarte()
    {
        return $this->belongsTo(clientCarte::class,'idCarte');
    }
}
