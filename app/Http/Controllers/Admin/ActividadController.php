<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActividadRequest;
use App\Jobs\ActividadEmailJob;
use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Colaborador;
use App\Models\Estado;
use App\Models\Role;
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

        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.actividades.create', compact('actividade', 'colaboradores',
         'estados', 'categorias'));
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
                    'actividad' => $actividad->descripcion,
                    'fecha' => $actividad->fecha_inicio,
                    'url' => url('/admin/actividad/'.$actividad->id)
                ]
            ];

            // $colaborador->notify(new ActividadAsignada($data));

            ActividadEmailJob::dispatch($colaborador, $data);
    
            session()->flash('message', ['success', ("Se ha creado la actividad")]);
            return redirect()->route('actividades.index');

        } catch (\Exception $e) {
            // return $e;
            session()->flash('message', ['warning', ("Ha ocurrido un error al crear la actividad")]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividade)
    {
        $actividad = $actividade->load(['colaborador', 'estado', 'categoria']);

        return view('admin.actividades.show', compact('actividad'));
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


        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.actividades.edit', compact('actividade', 'colaboradores',
         'estados', 'categorias'));
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

            $colaborador_actividad = $actividade->colaborador_id;

            $actividad = $actividade->update($request->all());

            if (auth()->user()->role_id == Role::ADMINISTRADOR) {
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
    
                    // $colaborador_actividad->notify(new ActividadAsignada($data));
                    ActividadEmailJob::dispatch($colaborador_actividad, $data);
                }
            }
           
    
            session()->flash('message', ['success', ("Se ha actualizado la actividad")]);

            return redirect()->route('actividades.index');

        } catch (\Exception $e) {
            // return $e;
            session()->flash('message', ['warning', ("Ha ocurrido un error al editar la actividad")]);
            return redirect()->back()->withInput();
        }
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
