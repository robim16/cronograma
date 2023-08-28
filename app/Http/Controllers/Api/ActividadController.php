<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ActividadRequest;
use App\Models\Actividad;
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
        $actividades = Actividad::with(['colaborador', 'estado'])
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

            // $actividad = new Actividad();
    
            // $actividad->descripcion = $request->title;
    
            // $actividad->fecha_inicio = $request->start;
    
            // $actividad->fecha_fin = $request->end;
    
            // $actividad->colaborador_id = $request->colaborador;
    
            // $actividad->estado_id = $request->estado;
    
            // $actividad->save();

            $actividad = Actividad::create($request->all());


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
          
            $actividade->descripcion = $request->descripcion;

            $actividade->fecha_inicio = date('Y-m-d', strtotime($request->fecha_inicio));
            
            $actividade->fecha_fin = date('Y-m-d', strtotime($request->fecha_fin));
    
            $actividade->colaborador_id = $request->colaborador_id;
    
            $actividade->estado_id = $request->estado_id;
    
            $actividade->save();
    
            return response()->json($actividade);
            
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
          
            $delete = $actividade->delete();

            return response()->json($delete);

        } catch (\Exception $e) {
            return $e;
        }
    }
}
