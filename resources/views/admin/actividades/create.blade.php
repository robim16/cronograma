@extends('layouts.admin')

@section('titulo', 'Crear actividades')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('actividades.index') }}">Actividades</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    @include('admin.actividades.form');
@endsection