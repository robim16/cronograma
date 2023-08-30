@extends('layouts.admin')


@section('title')
    Roles
@endsection

@section('titulo', 'Roles')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('content')
    @include('admin.roles.table')
@endsection