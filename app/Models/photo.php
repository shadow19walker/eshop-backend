<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;

    protected $table = 'photo';

    protected $primaryKey = 'idPhoto';

    public $timestamps = false;

    protected $fillable = [
        "lienPhoto",
        "codePro",
    ];

    public function produit()
    {
        return $this->belongsTo(produit::class,'codePro');
    }
}
