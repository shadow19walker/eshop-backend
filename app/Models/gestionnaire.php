<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomGest",
        "typeGest",
        "login",
        "pwd",
        "actif",
        "mobile",
    ];
}
