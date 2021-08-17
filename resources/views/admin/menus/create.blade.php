@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Crear Nuevo Menu</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.menus.store', 'autocomplete' => 'off', 'files' => true]) !!}

        @include('admin.menus.partials.form')

        {!! Form::submit('Crear Menu', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.menus.index') }}">Volver</a>
    </div>
</div>
@stop
