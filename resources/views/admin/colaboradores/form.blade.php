<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear Colaboradores</h3>

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
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" class="form-control"
                        value="{{ old('nombres') ?? @$colaboradore->nombres }}">
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control"
                        value="{{ old('apellidos') ?? @$colaboradore->apellidos }}">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion') ?? @$colaboradore->direccion }}">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono') ?? @$colaboradore->telefono }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email') ?? @$colaboradore->email }}">
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
