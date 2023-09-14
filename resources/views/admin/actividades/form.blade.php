<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> 
                    @if (!$actividade)
                        Crear
                    @else
                        Editar 
                    @endif 
                    Actividades
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (empty($actividade))
                    <form action="{{ route('actividades.store') }}" method="post">
                        @method('POST')
                    @else
                        <form action="{{ route('actividades.update', $actividade->id) }}" method="post">
                            @method('PUT')
                @endif
                @csrf

                @can('update', App\Actividad::class)
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="{{ old('nombre') ?? @$actividade->nombre }}">

                        @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        {{-- <input type="text" id="descripcion" name="descripcion" class="form-control"
                            value="{{ old('descripcion') ?? @$actividade->descripcion }}"> --}}

                        <textarea name="descripcion" id="descripcion" cols="30" rows="4" class="form-control">
                            {{ @$actividade->descripcion }}
                        </textarea>
                        @if ($errors->has('descripcion'))
                            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"
                            value="{{ old('fecha_inicio') ?? @$actividade->fecha_inicio }}">
                        @if ($errors->has('fecha_inicio'))
                            <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control"
                            value="{{ old('fecha_fin') ?? @$actividade->fecha_fin }}">
                        @if ($errors->has('fecha_fin'))
                            <span class="text-danger">{{ $errors->first('fecha_fin') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="colaborador_id">Colaborador</label>
                        <select name="colaborador_id" id="colaborador_id" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($colaboradores as $colaborador)
                                <option value="{{$colaborador->id}}" @if (@$actividade->colaborador_id == $colaborador->id)
                                    selected
                                @endif>{{ $colaborador->nombres }} {{ $colaborador->apellidos }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('colaborador_id'))
                            <span class="text-danger">{{ $errors->first('colaborador_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}" @if (@$actividade->categoria_id == $categoria->id)
                                    selected
                                @endif>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('categoria_id'))
                            <span class="text-danger">{{ $errors->first('categoria_id') }}</span>
                        @endif
                    </div>
                @endcan

                @can('view', App\Actividad::class)
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control">
                            {{ @$actividade->observaciones }}
                        </textarea>
                        @if ($errors->has('observaciones'))
                            <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                        @endif
                    </div>
                @endcan

                <div class="form-group">
                    <label for="estado_id">Estado</label>
                    <select name="estado_id" id="estado_id" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" @if (@$actividade->estado_id == $estado->id)
                                selected
                            @endif>{{ $estado->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('estado_id'))
                        <span class="text-danger">{{ $errors->first('estado_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">
                        {{ 'Cancelar' }}
                        <i class="fa fa-cancel"></i>
                    </button>
                    <button type="submit" class="btn btn-success float-right">
                        {{ empty($actividade) ? 'Crear' : 'Editar' }}
                        <i class="fa fa-edit"></i>
                    </button>

                </div>
                </form>

            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>
