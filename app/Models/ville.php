<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;

    protected $table = 'ville';

    protected $primaryKey = 'idVille';

    public $timestamps = false;

    protected $fillable = [
        "libelle"
    ];

    public function cliencartes()
    {
        return $this->hasMany(clientCarte::class,'idVille');
    }

    public function commande()
    {
        $this->hasMany(commande::class,'idVille');
    }

    public function expeditions()
    {
        return $this->hasMany(expedition::class,'idVille');
    }
}
