<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actividades</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <a class="m-2 float-right btn btn-primary" href="{{ route('actividades.create') }}"> <i
                            class="fas fa-plus"></i> Crear</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                {{-- <a class="m-2 float-right btn btn-primary" href="{{ route('actividades.create') }}"> <i
                    class="fas fa-plus"></i> Crear</a> --}}
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
<script>
    // $('#tabla-actividades').DataTable({
    //     "scrollX": true,
    //     "dom": 'Bfrtip',
    //     "buttons": [
    //         'excel', 'pdf', 'print'
    //     ],
    //     "fnInitComplete": function(){
    //         // Enable THEAD scroll bars
    //         $('.dataTables_scrollHead').css('overflow', 'auto');

    //         // Sync THEAD scrolling with TBODY
    //         $('.dataTables_scrollHead').on('scroll', function () {
    //             $('.dataTables_scrollBody').scrollLeft($(this).scrollLeft());
    //         });                    
    //     },
    //     "order": [
    //         [0, "desc"]
    //     ],
    //     "language": {
    //         "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
    //     }
    // });

    // $(document).ready(function () {

        var SITEURL = "{{ url('/') }}";

        $('#tabla-actividades').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            pageLength: 10,
			lengthMenu: [ 5, 10, 15, 20, 30, 40, 25, 50, 75, 100 ],
            processing: true,
            serverSide: false,
            ajax: `${SITEURL}/api/actividades`,
            columns: [
                { data: 'id' },
                { data: 'descripcion' },
                { data: 'fecha_inicio' },
                { data: 'fecha_fin' },
                { data: 'colaborador_id' },
                { data: 'estado_id' }
            ],
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
            }
        });
    // });
</script>
@endpush