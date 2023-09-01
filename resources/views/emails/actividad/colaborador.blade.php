@component('mail::message')
Actividad asignada.

{{ $details['msj'] }} en la plataforma, denominada {{ $details['actividad'] }} y programada para el día
{{ $details['fecha'] }} .

@component('mail::button', ['url' => $details['url']])
Ver la actividad
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
