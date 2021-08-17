@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<h1 >PEDIDOS</h1>

@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif


@livewire('admin.pedidos-index')

@stop
