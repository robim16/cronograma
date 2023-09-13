@extends('layouts.admin')

@section('title')
    Actividades programadas
@endsection

@section('titulo', 'Actividades')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('actividades.index') }}">Actividades</a></li>
    <li class="breadcrumb-item"><a href="{{ route('actividades.show', $actividad->id) }}">Actividad # {{ $actividad->id }}</a>
    </li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actividades</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a class="m-2 float-right btn btn-primary" href="{{ route('actividades.create') }}"> <i
                                    class="fas fa-plus"></i> Crear</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table id="tabla-actividades" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Colaborador</th>
                                <th>Categoría</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <tr>
                                <td>{{ $actividad->id }}</td>
                                <td>{{ $actividad->descripcion }}</td>
                                <td>{{  date('d/m/Y', strtotime($actividad->fecha_inicio)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($actividad->fecha_fin)) }}</td>
                                <td>{{ $actividad->colaborador->nombres }} {{ $actividad->colaborador->apellidos }}</td>
                                <td>{{ $actividad->categoria->nombre }}</td>
                                <td>{{ $actividad->observaciones }}</td>
                                <td>{{ $actividad->estado->nombre }}</td>
                                <td>
                                    <div class="btn-group">
                                        @if (auth()->user()->role_id == 1)
                                            <a href="{{ route('actividades.edit', $actividad->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        
                                            <form action="{{ route('actividades.destroy', $actividad->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-danger btn-sm mx-1">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        @endif
                                    </div>
                                </td>
                            </tr>
                       
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

@endsection
