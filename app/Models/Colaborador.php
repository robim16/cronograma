<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = 'colaboradores';

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'email',
        'user_id'
    ];
}
