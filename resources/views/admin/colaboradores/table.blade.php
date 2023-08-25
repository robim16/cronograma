<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Colaboradores</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <a class="m-2 float-right btn btn-primary" href="{{ route('colaboradores.create') }}"> <i
                    class="fas fa-plus"></i> Crear</a>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Identificación</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                            
                            <tr>
                                <td>{{ $colaborador->id }}</td>
                                <td>{{ $colaborador->identificacion }}</td>
                                <td>{{ $colaborador->nombres }}</td>
                                <td>{{ $colaborador->apellidos }}</td>
                                <td>{{ $colaborador->direccion }}</td>
                                <td>{{ $colaborador->telefono }}</td>
                                <td>{{ $colaborador->email}}</td>
                                <td>
                                    <a href="{{ route('colaboradores.edit', $colaborador->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('colaboradores.destroy', $colaborador->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
