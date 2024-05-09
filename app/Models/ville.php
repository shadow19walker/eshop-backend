<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;

    protected $fillable = [
        "libelle"
    ];

    public function cliencartes()
    {
        return $this->hasMany(clientCarte::class);
    }

    public function commande()
    {
        $this->hasMany(commande::class);
    }

    public function expeditions()
    {
        return $this->hasMany(expedition::class);
    }
}
