
@push('styles')
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>

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
                    @if (auth()->user()->role_id == 1)
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a class="m-2 float-right btn btn-primary" href="{{ route('actividades.create') }}"> <i
                                class="fas fa-plus"></i> Crear</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table id="tabla-actividades" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Colaborador</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>
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
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Colaborador</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
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
        var table;

        // table = $('#tabla-actividades').DataTable({
        //     order: [[3, 'desc']],
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'excelHtml5',
        //         'pdfHtml5'
        //     ],
        //     pageLength: 10,
        //     lengthMenu: [ 5, 10, 15, 20, 30, 40, 25, 50, 75, 100 ],
        //     processing: true,
        //     serverSide: false,
        //     ajax:{
        //         url:`${SITEURL}/api/actividades`,
        //         dataSrc:"",
        //         type: "GET"
        //     },
        //     columns: [
        //         { data: 'id' },
        //         { data: 'nombre' },
        //         { data: 'descripcion' },
        //         { data: 'fecha_inicio' },
        //         { data: 'fecha_fin' },
        //         { data: 'colaborador' },
        //         { data: 'categoria_id' },
        //         { data: 'estado_id' },
        //         { data: 'id' },

        //     ],
        //     columnDefs: [
        //         {
        //             "targets": [5],
        //             "render": function ( data, type, row ) {
        //                 return `${row.colaborador.nombres} ${row.colaborador.apellidos}` 
        //             }
        //         },
        //         {
        //             "targets": [6],
        //             "render": function ( data, type, row ) {
        //                 return `${row.categoria.nombre}` 
        //             }
        //         },
        //         {
        //             "targets": [7],
        //             "render": function ( data, type, row ) {
        //                 return `${row.estado.nombre}` 
        //             }
        //         },
        //         {
        //             "targets": [8],
        //             "render": function ( data, type, row ) {

        //                 @if(auth()->user()->role_id == 1)

        //                     return `<div class="btn-group">
        //                         <button class="btn btn-primary btn-sm mx-2" onclick="event_view(${data})">
        //                             <i class="fa fa-eye"></i>
        //                         </button>

        //                         <button class="btn btn-success btn-sm mx-2" onclick="event_edit(${data})">
        //                             <i class="fa fa-edit"></i>
        //                         </button>

        //                         <button class="btn btn-danger btn-sm" onclick="event_delete(${data})">
        //                             <i class="fa fa-trash"></i>
        //                         </button>
                                
        //                     </div>` 
        //                 @else

        //                     return `<div class="btn-group">
        //                         <button class="btn btn-primary btn-sm mx-2" onclick="event_view(${data})">
        //                             <i class="fa fa-eye"></i>
        //                         </button>
        //                     </div>
                            
        //                     <button class="btn btn-success btn-sm mx-2" onclick="event_edit(${data})">
        //                         <i class="fa fa-edit"></i>
        //                     </button>`;
        //                 @endif
        //             }
        //         },

                
        //     ],
        //     language: {
        //         "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        //     },
        //     initComplete: function () {
        //         this.api()
        //             .columns()
        //             .every(function () {
        //                 let column = this;
        //                 let title = column.footer().textContent;
        
        //                 // Create input element
        //                 let input = document.createElement('input');
        //                 input.placeholder = title;
        //                 column.footer().replaceChildren(input);
        
        //                 // Event listener for user input
        //                 input.addEventListener('keyup', () => {
        //                     if (column.search() !== this.value) {
        //                         column.search(input.value).draw();
        //                     }
        //                 });
        //             });
        //     }
        // });


        table = $('#tabla-actividades').DataTable({
            order: [[3, 'desc']],
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ],
            pageLength: 10,
            lengthMenu: [ 5, 10, 15, 20, 30, 40, 25, 50, 75, 100 ],
            processing: true,
            serverSide: true,
            ajax:{
                url:`${SITEURL}/api/actividades`,
                // dataSrc:"",
                type: "GET"
            },
            columns: [
                { data: 'id', name:'id' },
                { data: 'nombre', name: 'nombre' },
                { data: 'descripcion', name: 'descripcion' },
                { data: 'fecha_inicio', name: 'fecha_inicio' },
                { data: 'fecha_fin', name: 'fecha_fin' },
                { data: 'colaborador', name: 'colaborador' },
                { data: 'categoria.nombre', name: 'categoria.nombre' },
                { data: 'estado.nombre', name: 'estado.nombre' },
                { 
                    data: 'id',
                    name: 'id',
                    orderable: false, 
                    searchable: false
                },

            ],
            columnDefs: [
                // {
                //     "targets": [5],
                //     "render": function ( data, type, row ) {
                //         return `${row.colaborador.nombres} ${row.colaborador.apellidos}` 
                //     }
                // },
                {
                    "targets": [8],
                    "render": function ( data, type, row ) {

                        @if(auth()->user()->role_id == 1)

                            return `<div class="btn-group">
                                <button class="btn btn-primary btn-sm mx-2" onclick="event_view(${data})">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <button class="btn btn-success btn-sm mx-2" onclick="event_edit(${data})">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button class="btn btn-danger btn-sm" onclick="event_delete(${data})">
                                    <i class="fa fa-trash"></i>
                                </button>
                                
                            </div>` 
                        @else

                            return `<div class="btn-group">
                                <button class="btn btn-primary btn-sm mx-2" onclick="event_view(${data})">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            
                            <button class="btn btn-success btn-sm mx-2" onclick="event_edit(${data})">
                                <i class="fa fa-edit"></i>
                            </button>`;
                        @endif
                    }
                },

                
            ],
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
            },
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        let column = this;
                        let title = column.footer().textContent;
        
                        // Create input element
                        let input = document.createElement('input');
                        input.placeholder = title;
                        column.footer().replaceChildren(input);
        
                        // Event listener for user input
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                        });
                    });
            }
        });


        function event_edit(id) {
            window.location.href = `${SITEURL}/admin/actividades/${id}/edit`;
        }

        function event_view(id) {
            window.location.href = `${SITEURL}/admin/actividades/${id}`;
        }


        function event_delete(id) {
            axios.delete(`${SITEURL}/api/actividades/${id}`)
                .then( function (res) {

                    table.ajax.reload();
                    toastr.success('Se ha eliminado la actividad exitosamente.')
                })
                .catch( function (err) {
                    console.log(err);

                    toastr.error('Ha ocurrido un error al eliminar la actividad.');
                });  
        }
        
    </script>
@endpush