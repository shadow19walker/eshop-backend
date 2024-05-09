<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paieInfluenceur extends Model
{
    use HasFactory;

    protected $fillable = [
        "montant",
        "idInf",
        "validite",
        "commentaire",
    ];

    public function influenceur()
    {
        return $this->hasOne(influenceur::class);
    }
}
