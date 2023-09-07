@extends('layouts.admin')

@section('titulo', 'Crear categorías')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorías</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    @include('admin.categorias.form');
@endsection