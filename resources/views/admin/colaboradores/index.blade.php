@extends('layouts.admin')


@section('title')
    Colaboradores
@endsection

@section('titulo', 'Colaboradores')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('colaboradores.index') }}">Colaboradores</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    @include('admin.colaboradores.table')
@endsection