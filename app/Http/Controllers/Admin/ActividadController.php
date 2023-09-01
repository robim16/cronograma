<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActividadRequest;
use App\Models\Actividad;
use App\Models\Colaborador;
use App\Models\Estado;
use App\Notifications\ActividadAsignada;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $actividades = Actividad::with(['colaborador', 'estado'])->get();

        return view('admin.actividades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colaboradores = Colaborador::orderBy('nombres')
            ->orderBy('apellidos')
            ->get();


        $actividade = '';
        
        $estados = Estado::orderBy('nombre')
            ->get();

        return view('admin.actividades.create', compact('actividade', 'colaboradores', 'estados'));
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
           
            $actividad = Actividad::create($request->all());

            $colaborador = Colaborador::where('id', $request->colaborador_id)->first();

            $msg = 'Usted tiene una nueva actividad asignada';

            $data = [
                'actividad' => [
                    'msj' => $msg,
                    'colaborador' => $colaborador->nombres.' '.$colaborador->apellidos,
                    'actividad' => $actividad,
                    'url' => url('/admin/actividad/'.$actividad->id)
                ]
            ];

            $colaborador->notify(new ActividadAsignada($data));
    
            session()->flash('message', ['success', ("Se ha creado la actividad")]);
            return redirect()->route('actividades.index');

        } catch (\Exception $e) {
            // return $e;
            session()->flash('message', ['warning', ("Ha ocurrido un error al crear la actividad")]);
            return redirect()->back();
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
    public function edit(Actividad $actividade)
    {
        $colaboradores = Colaborador::orderBy('nombres')
            ->orderBy('apellidos')
            ->get();


        $estados = Estado::orderBy('nombre')
            ->get();

        return view('admin.actividades.edit', compact('actividade', 'colaboradores', 'estados'));
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
        $actividad = $actividade->update($request->all());

        session()->flash('message', ['success', ("Se ha actualizado la actividad")]);
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividade)
    {
        try {
          
            $delete = $actividade->delete();

            session()->flash('message', ['success', ("Se ha eliminado la actividad")]);
            return redirect()->route('actividades.index');


        } catch (\Exception $e) {
            session()->flash('message', ['warning', ("Ha ocurrido un error al eliminar la actividad")]);
            return redirect()->route('actividades.index');
        }
    }
}
