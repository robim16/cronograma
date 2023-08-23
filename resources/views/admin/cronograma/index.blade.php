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

        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // var calendar = $('#calendar').fullCalendar({
            //     editable: true,
            //     events: SITEURL + "/admin/cronograma",
            //     displayEventTime: false,
            //     editable: true,
            //     eventRender: function(event, element, view) {
            //         if (event.allDay === 'true') {
            //             event.allDay = true;
            //         } else {
            //             event.allDay = false;
            //         }
            //     },
            //     selectable: true,
            //     selectHelper: true,
            //     select: function(start, end, allDay) {
            //         var title = prompt('Event Title:');
            //         if (title) {
            //             var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
            //             var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
            //             $.ajax({
            //                 url: SITEURL + "/admin/cronograma",
            //                 data: {
            //                     title: title,
            //                     start: start,
            //                     end: end,
            //                     type: 'add'
            //                 },
            //                 type: "POST",
            //                 success: function(data) {
            //                     displayMessage("Event Created Successfully");

            //                     calendar.fullCalendar('renderEvent', {
            //                         id: data.id,
            //                         title: title,
            //                         start: start,
            //                         end: end,
            //                         allDay: allDay
            //                     }, true);

            //                     calendar.fullCalendar('unselect');
            //                 }
            //             });
            //         }
            //     },
            //     eventDrop: function(event, delta) {
            //         var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            //         var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

            //         $.ajax({
            //             url: SITEURL + '/fullcalenderAjax',
            //             data: {
            //                 title: event.title,
            //                 start: start,
            //                 end: end,
            //                 id: event.id,
            //                 type: 'update'
            //             },
            //             type: "POST",
            //             success: function(response) {
            //                 displayMessage("Event Updated Successfully");
            //             }
            //         });
            //     },
            //     eventClick: function(event) {
            //         var deleteMsg = confirm("Do you really want to delete?");
            //         if (deleteMsg) {
            //             $.ajax({
            //                 type: "POST",
            //                 url: SITEURL + '/fullcalenderAjax',
            //                 data: {
            //                     id: event.id,
            //                     type: 'delete'
            //                 },
            //                 success: function(response) {
            //                     calendar.fullCalendar('removeEvents', event.id);
            //                     displayMessage("Event Deleted Successfully");
            //                 }
            //             });
            //         }
            //     }

            // });

            var calendarEl = document.getElementById('calendar')
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locales: 'es',
                eventSources: [
                    {
                        url: SITEURL + "/admin/cronograma/events",
                        // color: 'blue',
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
                eventClick: function(info) {

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
                    
                    $('#modal-actividad').modal('show');
                }
            })

            calendar.render()
        });


        function event_update() {
            let id = $('#event_id').val();
            let title = $('#descripcion').val();
            let colaborador = $('#colaborador_id').val();
            let estado = $('#estado_id').val();

            axios.put(`${SITEURL}/admin/cronograma/actividad/${id}`, {
                title,
                colaborador,
                estado
            })
                .then(res => console.log(res.data))
                .catch(err => console.log(err));  
        }
    </script>
@endpush
