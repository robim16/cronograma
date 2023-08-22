<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColaboradorRequest;
use App\Models\Colaborador;
use Illuminate\Http\Request;

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
        return view('admin.colaboradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColaboradorRequest $request)
    {
        $colaborador = Colaborador::create($request->all());

        session()->flash('message', ['success', ("Se ha creado el colaborador")]);
        return redirect()->route('colaboradores.index');
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
        return view('admin.colaboradores.edit', compact('colaboradore'));
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
        $colaborador = $colaboradore->update($request->all());

        session()->flash('message', ['success', ("Se ha actualizado el colaborador")]);
        return redirect()->route('colaboradores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
