
@push('styles')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endpush

<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actividades</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div> --}}

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
                            <th>Estado</th>
                            {{-- <th>Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($actividades as $actividad)
                            
                            <tr>
                                <td>{{ $actividad->id }}</td>
                                <td>{{ $actividad->descripcion }}</td>
                                <td>{{ $actividad->fecha_inicio }}</td>
                                <td>{{ $actividad->fecha_fin }}</td>
                                <td>{{ $actividad->colaborador->nombres }} {{ $actividad->colaborador->apellidos }}</td>
                                <td>{{ $actividad->estado->nombre }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('actividades.edit', $actividad->id)}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <form action="{{ route('actividades.destroy', $actividad->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                         --}}
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    
    <script>
    
        var SITEURL = "{{ url('/') }}";

        $('#tabla-actividades').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ],
            pageLength: 10,
            lengthMenu: [ 5, 10, 15, 20, 30, 40, 25, 50, 75, 100 ],
            processing: true,
            serverSide: false,
            ajax:{
                url:`${SITEURL}/api/actividades`,
                dataSrc:"",
                type: "GET"
            },
            columns: [
                { data: 'id' },
                { data: 'descripcion' },
                { data: 'fecha_inicio' },
                { data: 'fecha_fin' },
                { data: 'colaborador' },
                { data: 'estado_id' }
            ],
            columnDefs: [
                {
                    "targets": [4],
                    "render": function ( data, type, row ) {
                        return `${row.colaborador.nombres} ${row.colaborador.apellidos}` 
                    }
                },
                {
                    "targets": [5],
                    "render": function ( data, type, row ) {
                        return `${row.estado.nombre}` 
                    }
                },
            ],
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
            }
        });
        
    </script>
@endpush