@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($usuario, ['route' => ['admin.usuarios.update', $usuario], 'autocomplete' => 'off', 'method' => 'PUT']) !!}

        @include('admin.usuarios.partials.form')

        {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.usuarios.index') }}">Volver</a>
    </div>
</div>
@stop




