<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ActividadRequest;
use App\Models\Actividad;
use App\Models\Colaborador;
use App\Models\Role;
use App\Notifications\ActividadAsignada;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();

        $rol = $user->rol;


        $actividades = Actividad::when($rol->id != Role::ADMINISTRADOR, function ($query) use($user) {
            return $query->where('colaborador_id', $user->colaborador->id);
        })
            ->with(['colaborador', 'estado', 'categoria'])
            ->orderBy('fecha_inicio')
            ->get();

        return response()->json($actividades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadRequest $request)
    {
        try {
           
            $data = $request->validated();


            $actividad = Actividad::create($request->all());

            $colaborador = Colaborador::where('id', $request->colaborador_id)->first();

            $msg = 'Usted tiene una nueva actividad asignada';

            $data = [
                'actividad' => [
                    'msj' => $msg,
                    'colaborador' => $colaborador->nombres.' '.$colaborador->apellidos,
                    'actividad' => $actividad->descripcion,
                    'fecha' => $actividad->fecha_inicio,
                    'url' => url('/admin/actividad/'.$actividad->id)
                ]
            ];

            $colaborador->notify(new ActividadAsignada($data));


            return $actividad;

        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadRequest $request, Actividad $actividade)
    {
        try {
            

            // $user = auth()->user();

            // $rol = $user->role_id;


            // if ($rol == Role::ADMINISTRADOR || ($rol == Role::COLABORADOR)) {
               
                $colaborador_actividad = $actividade->colaborador_id;
    
            
                $request->merge([
                    'fecha_inicio' => date('Y-m-d', strtotime($request->fecha_inicio)),
                    'fecha_fin' => date('Y-m-d', strtotime($request->fecha_fin)),
                ]);
    
                $actividad = $actividade->update($request->all());
    
                if ($colaborador_actividad != $request->colaborador_id) {
                    $colaborador_actividad = Colaborador::where('id', $request->colaborador_id)->first();
    
                    $msg = 'Usted tiene una nueva actividad asignada';
    
                    $data = [
                        'actividad' => [
                            'msj' => $msg,
                            'colaborador' => $colaborador_actividad->nombres.' '.$colaborador_actividad->apellidos,
                            'actividad' => $actividade->descripcion,
                            'fecha' => $actividade->fecha_inicio,
                            'url' => url('/admin/actividad/'.$actividade->id)
                        ]
                    ];
    
                    $colaborador_actividad->notify(new ActividadAsignada($data));
                }
        
                return response()->json($actividade);
                
            // } else {
            //     return response()->json('Unauthorized', 401);
            // }
            
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Actividad $actividade)
    {
        try {

            $user = auth()->user();

            $rol = $user->role_id;
          
            if ($rol == Role::ADMINISTRADOR) {
               
                $delete = $actividade->delete();
    
                return response()->json($delete);

            } else {
                return response()->json('Unauthorized', 401);
            }
            

        } catch (\Exception $e) {
            return $e;
        }
    }
}
