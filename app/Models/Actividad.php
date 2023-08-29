<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';

    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'colaborador_id',
        'estado_id',
        'color'
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
