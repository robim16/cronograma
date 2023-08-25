@extends('layouts.admin')

@section('titulo', 'Cronograma')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cronograma.index') }}">Cronograma</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')

    @push('styles')
        <style>
            .fc-daygrid-event {
                white-space: normal !important;
                align-items: normal !important;
            }
        </style>
    @endpush

    <div class="container">
        <h1>Cronograma de actividades</h1>
        <div id='calendar'></div>
    </div>

    @include('partials.modals.actividad')

@endsection

@push('scripts')
    <script>
        var SITEURL = "{{ url('/') }}";
        var start = '';
        var end = '';
        var calendar;

        $(document).ready(function() {


            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            var calendarEl = document.getElementById('calendar')
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locales: 'es',
                eventSources: [
                    {
                        url: SITEURL + "/admin/cronograma/events",
                        color: 'blue',
                        // textColor: 'white'
                    }
                ],
                displayEventTime: false,
                editable: true,
                selectable: true,
                eventContent: function(arg) {
                    var colaborador = arg.event.extendedProps.colaborador;
                    var estado = arg.event.extendedProps.estado;

                    let italicEl = document.createElement('i')

                    if (arg.event.extendedProps.colaborador) {
                        italicEl.innerHTML =`<div>${arg.event.title}</div>
                            <div> ${colaborador}</div>
                            <div> ${estado}</div>`
                    } else {
                        italicEl.innerHTML = 'normal event'
                    }

                    let arrayOfDomNodes = [ italicEl ]
                    return { domNodes: arrayOfDomNodes}
                },
                select: function(info) {
                
                    start = info.startStr;
                    end = info.endStr;


                    axios.get(`${SITEURL}/api/colaboradores`)
                        .then(function (res) {

                            $.each(res.data, function (index, colaborador) {
                                $("#colaborador_id").append(`<option value="${colaborador.id}">
                                    ${colaborador.nombres} ${colaborador.apellidos}
                                    </option>`);
                            });

                        })
                        .catch(err => console.log(err));
        
        
        
                    axios.get(`${SITEURL}/api/estados`)
                        .then(function (res) {

                            $.each(res.data, function (index, estado) {
                                $("#estado_id").append(`<option value="${estado.id}">
                                    ${estado.nombre}</option>`);
                            });

                        })
                        .catch(err => console.log(err));
                            

                    calendar.unselect();

                    $('.modal-title').html('Crear actividad');
                    $('#modal-actividad').modal('show');
                    
                },
                eventDrop: function(info) {
                    alert(info.event.title + " ha sido reprogramado a la fecha " + info.event.startStr);

                    Swal.fire({
                        title: 'Desea confirmar este cambio?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Aceptar',
                        denyButtonText: `Cancelar`,
                    }).then((result) => {
                        
                        if (result.isConfirmed) {

                            let id = info.event.id;

                            axios.put(`${SITEURL}/api/actividades/${id}`, {
                                title: info.event.title,
                                colaborador: info.event.extendedProps.colaborador_id,
                                estado: info.event.extendedProps.estado_id,
                                start: info.event.startStr,
                                end: info.event.endStr
                            })
                                .then( function (res) {
                                
                                    console.log(res);
                                    toastr.success('Se ha reprogramado la actividad exitosamente.')
                                })
                                .catch( function (err) {
                                    console.log(err);
                                    toastr.error('Ha ocurrido un error al reprogramar.');
                                });  

                        } else if (result.isDenied) {
                            info.revert();
                            
                        }
                    })

                },
                eventClick: function(info) {

                    Swal.fire({
                        title: 'Desea editar o eliminar la actividad?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Editar',
                        denyButtonText: `Eliminar`,
                    }).then((result) => {
                   
                        if (result.isConfirmed) {
                            
                            $('#descripcion').val(info.event.title);
                            $('#event_id').val(info.event.id);
        
                            axios.get(`${SITEURL}/api/colaboradores`)
                                .then(function (res) {
                                    var col = info.event.extendedProps.colaborador_id
        
                                    $.each(res.data, function (index, colaborador) {
                                        $("#colaborador_id").append(`<option value="${colaborador.id}" ${col == colaborador.id ? 'selected' : ''}>
                                            ${colaborador.nombres} ${colaborador.apellidos}
                                            </option>`);
                                    });
        
                                })
                                .catch(err => console.log(err));
        
        
        
                            axios.get(`${SITEURL}/api/estados`)
                                .then(function (res) {
                                    var est = info.event.extendedProps.estado_id
        
                                    $.each(res.data, function (index, estado) {
                                        $("#estado_id").append(`<option value="${estado.id}" ${est == estado.id ? 'selected' : ''}>
                                            ${estado.nombre}</option>`);
                                    });
        
                                })
                                .catch(err => console.log(err));
                            
                            $('.modal-title').html('Editar actividad');
                            $('#modal-actividad').modal('show');

                        } else if (result.isDenied) {
                            
                            var deleteMsg = confirm("Realmente desea eliminar la actividad?");

                            
                            if (deleteMsg) {
                                let id = info.event.id;
                                
                                axios.delete(`${SITEURL}/api/actividades/${id}`)
                                    .then(function (res) {
                                        toastr.success('Se ha eliminado la actividad exitosamente.')
                                        
                                        if (typeof calendar !== 'undefined') {
                                            calendar.refetchEvents();
                                        }
                                    })
                                    .catch( function (err) {
                                        console.log(err);
                                        toastr.error('Ha ocurrido un error al eliminar.');
                                    });  
                            }

                        }
                    })

                }
            })

            calendar.render()
        });


        function event_save() {

            if (start != '' && end != '') {

                let title = $('#descripcion').val();
                let colaborador = $('#colaborador_id').val();
                let estado = $('#estado_id').val();
    
                axios.post(`${SITEURL}/api/actividades`, {
                    title,
                    colaborador,
                    estado,
                    start,
                    end
                })
                    .then( function (res) {
                        toastr.success('Se ha creado la actividad exitosamente.')
                        $('#modal-actividad').modal('hide');

                        if (typeof calendar !== 'undefined') {
                            calendar.refetchEvents();
                        }
                    })
                    .catch( function (err) {
                        console.log(err);

                        for (var [ el, message ] of Object.entries(err.response.data.errors )) {
                            $(`#${el}-error`).html(message);
                        }

                        toastr.error('Ha ocurrido un error al crear la actividad.');
                    });  
                
            } else {
                
                let id = $('#event_id').val();
                let title = $('#descripcion').val();
                let colaborador = $('#colaborador_id').val();
                let estado = $('#estado_id').val();
    
                axios.put(`${SITEURL}/api/actividades/${id}`, {
                    title,
                    colaborador,
                    estado
                })
                    .then( function (res) {
                        toastr.success('Se ha editado la actividad exitosamente.')

                        if (typeof calendar !== 'undefined') {
                            calendar.refetchEvents();
                        }

                        $('#modal-actividad').modal('hide');
                    })
                    .catch( function (err) {
                        console.log(err);
                        toastr.error('Ha ocurrido un error al editar.');
                    });  

            }
        }
    </script>
@endpush
