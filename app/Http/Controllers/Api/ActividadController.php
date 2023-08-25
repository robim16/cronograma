<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        //
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
    public function store(Request $request)
    {
        try {
           
            $actividad = new Actividad();
    
            $actividad->descripcion = $request->title;
    
            $actividad->fecha_inicio = $request->start;
    
            $actividad->fecha_fin = $request->end;
    
            $actividad->colaborador_id = $request->colaborador;
    
            $actividad->estado_id = $request->estado;
    
            $actividad->save();

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
    public function update(Request $request, Actividad $actividade)
    {
        try {
          
            $actividade->descripcion = $request->title;

            if (($request->start != '') && ($request->end != '')) {

                $actividade->fecha_inicio = date('Y-m-d', strtotime($request->start));
                $actividade->fecha_fin = date('Y-m-d', strtotime($request->end));
            }
    
            $actividade->colaborador_id = $request->colaborador;
    
            $actividade->estado_id = $request->estado;
    
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
