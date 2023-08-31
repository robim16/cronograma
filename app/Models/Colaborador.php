<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Colaborador extends Model
{
    use HasFactory;
    use Notifiable;
    
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

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
