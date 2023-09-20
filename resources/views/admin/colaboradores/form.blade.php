<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    @if (!@$colaboradore)
                        Crear
                    @else
                        Editar 
                    @endif 
                    Colaboradores
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (empty($colaboradore))
                    <form action="{{ route('colaboradores.store') }}" method="post">
                        @method('POST')
                    @else
                        <form action="{{ route('colaboradores.update', $colaboradore->id) }}" method="post">
                            @method('PUT')
                @endif
                @csrf

                <div class="form-group">
                    <label for="identificacion">Identificación</label>
                    <input type="text" id="identificacion" name="identificacion" class="form-control"
                        value="{{ old('identificacion') ?? @$colaboradore->identificacion }}">
                    @if ($errors->has('identificacion'))
                        <span class="text-danger">{{ $errors->first('identificacion') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" class="form-control"
                        value="{{ old('nombres') ?? @$colaboradore->nombres }}">
                    @if ($errors->has('nombres'))
                        <span class="text-danger">{{ $errors->first('nombres') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control"
                        value="{{ old('apellidos') ?? @$colaboradore->apellidos }}">
                    @if ($errors->has('apellidos'))
                        <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion') ?? @$colaboradore->direccion }}">
                    @if ($errors->has('direccion'))
                        <span class="text-danger">{{ $errors->first('direccion') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono') ?? @$colaboradore->telefono }}">
                    @if ($errors->has('telefono'))
                        <span class="text-danger">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email') ?? @$colaboradore->email }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rol_id">Rol</label>
                    <select name="rol_id" id="rol_id" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}" @if (@$colaboradore->user->role_id == $rol->id)
                                selected
                            @endif>{{ $rol->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('rol_id'))
                        <span class="text-danger">{{ $errors->first('rol_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        value="{{ old('password') ?? @$colaboradore->user->password }}">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">
                        {{ 'Cancelar' }}
                        <i class="fa fa-cancel"></i>
                    </button>
                    <button type="submit" class="btn btn-success float-right">
                        {{ empty($colaboradore) ? 'Crear' : 'Editar' }}
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
