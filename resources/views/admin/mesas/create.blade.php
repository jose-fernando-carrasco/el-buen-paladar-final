@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Crear Nueva Mesa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.mesas.store', 'autocomplete' => 'off', 'files' => true]) !!}

        @include('admin.mesas.partials.form')

        {!! Form::submit('Crear Mesa', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.mesas.index') }}">Volver</a>
    </div>
</div>
@stop


