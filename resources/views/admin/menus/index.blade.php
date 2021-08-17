@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<a class="btn btn-warning  btn-lg float-right border border-secondary " href="{{ route('admin.menus.create') }}">NUEVO MENU</a>
<h1>Listado de Menus</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

@livewire('admin.menu.menus-index')

@stop


