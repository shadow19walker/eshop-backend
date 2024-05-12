<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;

    protected $table = 'fournisseur';

    protected $primaryKey = 'idFour';

    public $timestamps = false;

    protected $fillable = [
        "nom",
        "adresse",
        "ville",
        "pays",
        "mobile1",
        "mobile2",
        "type",
    ];

    public function achatfournisseurs()
    {
        return $this->hasMany(achatFournisseur::class,'idFour');
    }
}
