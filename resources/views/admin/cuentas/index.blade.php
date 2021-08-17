@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<h1 >CUENTAS</h1>
{{-- <a class="btn btn-warning  btn-lg  border border-secondary " href="{{ route('admin.menus.create') }}">NUEVO PEDIDO</a> --}}
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif


@livewire('admin.cuentas-index')

@stop
