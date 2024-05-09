<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedition extends Model
{
    use HasFactory;
    public $fillable = [
        "idVille",
        "transporteur",
        "prix",
        "mobile1",
        "mobile2",
    ];

    public function ville()
    {
        return $this->hasOne(ville::class);
    }
}
