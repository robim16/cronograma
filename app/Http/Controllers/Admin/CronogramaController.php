<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Role;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.cronograma.index');
    }


    public function events(Request $request)
    {
        $user = auth()->user();

        $rol = $user->rol;

        $actividades = Actividad::select('id', 'descripcion as title', 'fecha_inicio as start',
            'fecha_fin as end', 'colaborador_id', 'estado_id', 'color', 'categoria_id')
            ->when($rol->id != Role::ADMINISTRADOR, function ($query) use($user) {
                return $query->where('colaborador_id', $user->colaborador->id);
            })
            ->whereDate('fecha_inicio', '>=', $request->start)
            ->whereDate('fecha_fin', '<=', $request->end)
            ->with(['colaborador', 'estado', 'categoria'])
            ->get();


        $data = [];

        foreach ($actividades as $event) {
            $data[] = [
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'allDay'=> true,
                'color'=> $event->color,
                'id' => $event->id,
                'extendedProps'=> [
                    'colaborador' => $event->colaborador->nombres.' '.$event->colaborador->apellidos,
                    'estado' => $event->estado->nombre,
                    'categoria' => $event->categoria->nombre,
                    'colaborador_id' => $event->colaborador->id,
                    'estado_id' => $event->estado->id,
                    'categoria_id' => $event->categoria->id,
                ]
            ];
        }
        
        return response()->json(collect($data));
       
    }
}


