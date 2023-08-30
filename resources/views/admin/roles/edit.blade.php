@extends('layouts.admin')

@section('titulo', 'Editar roles')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    @include('admin.roles.form');
@endsection