<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.cronograma.index');
    }


    public function events(Request $request)
    {
        
        $actividades = Actividad::select('id', 'descripcion as title', 'fecha_inicio as start',
            'fecha_fin as end', 'colaborador_id', 'estado_id')
            ->whereDate('fecha_inicio', '>=', $request->start)
            ->whereDate('fecha_fin', '<=', $request->end)
            ->with(['colaborador', 'estado'])
            ->get();


        $data = [];

        foreach ($actividades as $event) {
            $data[] = [
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'allDay'=> true,
                'id' => $event->id,
                'extendedProps'=> [
                    'colaborador' => $event->colaborador->nombres.' '.$event->colaborador->apellidos,
                    'estado' => $event->estado->nombre,
                    'colaborador_id' => $event->colaborador->id
                ]
            ];
        }
        
        return response()->json(collect($data));
       
    }


    public function event_update(Request $request, Actividad $actividade)
    {
        return response()->json($actividade);
    }
}


