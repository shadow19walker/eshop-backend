<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class influenceur extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "mobile",
        "codePromo",
        "actif",
        "montant",
        "string",
    ];

    public function paieinfluenceurs()
    {
        return $this->hasMany(paieInfluenceur::class);
    }
}
