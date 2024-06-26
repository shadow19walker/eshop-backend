<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie';

    protected $primaryKey = 'idCat';

    public $timestamps = false;

    protected $fillable = [
        "nomCat"
    ];

    public function produits()
    {
        return $this->hasMany(produit::class, 'idCategorie');
    }


}
