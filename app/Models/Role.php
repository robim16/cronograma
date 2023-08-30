<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMINISTRADOR = 1;
    const COLABORARDOR = 2;

    protected $fillable = [
        'nombre', 'descripcion'
    ];
}
