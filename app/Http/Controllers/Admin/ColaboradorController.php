<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColaboradorRequest;
use App\Models\Colaborador;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaborador::orderBy('nombres')
            ->orderBy('apellidos')
            ->get();

        return view('admin.colaboradores.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('nombre')
            ->get();
            
        return view('admin.colaboradores.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColaboradorRequest $request)
    {
        try {
            
            DB::beginTransaction();


            $user = new User();

            $user->name = $request->nombres;

            $user->email = $request->email;

            $user->role_id = $request->rol_id;

            $user->password = Hash::make($request->password);

            $user->save();


            $colaborador = Colaborador::create($request->except(['rol_id', 'password']));
    
            DB::commit();

            session()->flash('message', ['success', ("Se ha creado el colaborador")]);
            return redirect()->route('colaboradores.index');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('message', ['warning', ("Ha ocurrido un error al crear el colaborador")]);
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
    public function edit(Colaborador $colaboradore)
    {
        $roles = Role::orderBy('nombre')
            ->get();

        $colaboradore->load('user');

        return view('admin.colaboradores.edit', compact('colaboradore', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColaboradorRequest $request, Colaborador $colaboradore)
    {

        try {
           
            DB::beginTransaction();

            $user = User::where('id', $colaboradore->user_id)->first();

            $user->name = $request->nombres;

            $user->email = $request->email;

            $user->role_id = $request->rol_id;

            if ($request->password != $user->password) {
                $user->password = Hash::make($request->password);
            }

            
            $user->save();


            $colaborador = $colaboradore->update($request->except(['rol_id', 'password']));

            DB::commit();
    
            session()->flash('message', ['success', ("Se ha actualizado el colaborador")]);
            return redirect()->route('colaboradores.index');

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('message', ['warning', ("Ha ocurrido un error al edit el colaborador")]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaboradore)
    {
        try {
          
            $delete = $colaboradore->delete();

            session()->flash('message', ['success', ("Se ha eliminado el colaborador")]);
            return redirect()->route('colaboradores.index');


        } catch (\Exception $e) {
            session()->flash('message', ['warning', ("Ha ocurrido un error al eliminar el colaborador")]);
            return redirect()->route('colaboradores.index');
        }
    }
}
