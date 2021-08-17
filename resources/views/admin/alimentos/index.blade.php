@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<a class="btn btn-warning  btn-lg float-right border border-secondary " href="{{ route('admin.alimentos.create') }}">NUEVO ALIMENTO</a>
<h1>Listado de Alimentos</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

     @livewire('admin.alimentos-index')

@stop


