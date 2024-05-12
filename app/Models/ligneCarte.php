<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneCarte extends Model
{
    use HasFactory;

    protected $table = 'ligneCarte';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        "idFac",
        "idCarte",
        "point",
        "montantFac",
    ];

    public function clientcarte()
    {
        return $this->hasOne(clientCarte::class,'idCarte');
    }

    public function facture()
    {
        return $this->hasOne(facture::class,'idFac');
    }

}
