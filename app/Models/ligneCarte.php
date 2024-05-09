<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneCarte extends Model
{
    use HasFactory;

    protected $fillable = [
        "idFac",
        "idCarte",
        "point",
        "dateOpera",
        "montantFac",
    ];

    public function clientcarte()
    {
        return $this->hasOne(clientCarte::class);
    }

    public function facture()
    {
        return $this->hasOne(facture::class);
    }

}
