<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paieInfluenceur extends Model
{
    use HasFactory;

    protected $table = 'paieInfluenceur';

    protected $primaryKey = 'idPaiement';

    public $timestamps = false;


    protected $fillable = [
        "montant",
        "idInf",
        "validite",
        "commentaire",
    ];

    public function influenceur()
    {
        return $this->belongsTo(influenceur::class,'idInf');
    }
}
