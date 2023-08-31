<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Colaborador;
use App\Models\Role;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $rol = $user->rol;

        $colaboradores = Colaborador::when($rol->id != Role::ADMINISTRADOR, function ($query) use($user) {
            return $query->where('id', $user->colaborador->id);
        })
            ->orderBy('nombres')
            ->orderBy('apellidos')
            ->get();

        return response()->json($colaboradores);
    }
}
