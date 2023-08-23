<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::orderBy('nombres')
            ->orderBy('apellidos')
            ->get();

        return response()->json($colaboradores);
    }
}
