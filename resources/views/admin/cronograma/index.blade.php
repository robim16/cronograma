@extends('layouts.admin')

@section('titulo', 'Cronograma')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cronograma.index') }}">Cronograma</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    <div class="container">
        <h1>Cronograma de actividades</h1>
        <div id='calendar'></div>
    </div>

@endsection

@push('scripts')
    {{-- <script src="{{ asset('fullcalendar-6.1.8/dist/index.global.js') }}"></script> --}}

    <script>
        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

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
                eventDidMount: function(info) {
                    var colaborador = info.event.extendedProps.colaborador;
                    $(info.el).find('.fc-title').append("<div>" + colaborador + "</div>");
                    // info.el.children[1].innerHTML = colaborador
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        // $.ajax({
                        //     type: "POST",
                        //     url: SITEURL + '/fullcalenderAjax',
                        //     data: {
                        //         id: event.id,
                        //         type: 'delete'
                        //     },
                        //     success: function(response) {
                        //         calendar.fullCalendar('removeEvents', event.id);
                        //         displayMessage("Event Deleted Successfully");
                        //     }
                        // });
                        let fecha_inicio = calendar.formatDate(event.start, "Y-MM-DD")
                        alert(fecha_inicio)
                    }
                }
            })

            calendar.render()
        });

        // function displayMessage(message) {
        //     toastr.success(message, 'Event');
        // }
    </script>
@endpush