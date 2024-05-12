<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedition extends Model
{
    use HasFactory;

    protected $table = 'expedition';

    protected $primaryKey = 'idExp';

    public $timestamps = false;

    public $fillable = [
        "idVille",
        "transporteur",
        "prix",
        "mobile1",
        "mobile2",
    ];

    public function ville()
    {
        return $this->belongsTo(ville::class, 'idVille');
    }
}
