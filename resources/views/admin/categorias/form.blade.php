<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> 
                    @if (!@$categoria)
                        Crear
                    @else
                        Editar 
                    @endif 
                    Categorías
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (empty($categoria))
                    <form action="{{ route('categorias.store') }}" method="post">
                        @method('POST')
                    @else
                        <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
                            @method('PUT')
                @endif
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{ old('nombre') ?? @$categoria->nombre }}">
                    @if ($errors->has('nombre'))
                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control"
                        value="{{ old('descripcion') ?? @$categoria->descripcion }}">
                    @if ($errors->has('descripcion'))
                        <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">
                        {{ 'Cancelar' }}
                        <i class="fa fa-cancel"></i>
                    </button>
                    <button type="submit" class="btn btn-success float-right">
                        {{ empty($categoria) ? 'Crear' : 'Editar' }}
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
