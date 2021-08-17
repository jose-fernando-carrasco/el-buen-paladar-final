@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<a class="btn btn-warning  btn-lg float-right border border-secondary " href="{{ route('admin.especiales.create') }}">NUEVO MENU ESPECIAL</a>
<h1>Listado de Ofertas Especiales</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

@livewire('admin.especial.especial-index')

@stop


