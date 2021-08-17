@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Crear Nuevo Menu Especial</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.especiales.store', 'autocomplete' => 'off', 'files' => true]) !!}

        @include('admin.especiales.partials.form')

        {!! Form::submit('Crear Menu', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.especiales.index') }}">Volver</a>
    </div>
</div>
@stop
