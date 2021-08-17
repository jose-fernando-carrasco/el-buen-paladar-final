@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Editar Mesa</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($mesa, ['route' => ['admin.mesas.update', $mesa], 'autocomplete' => 'off', 'method' => 'PUT']) !!}

        @include('admin.mesas.partials.form')

        {!! Form::submit('Actualizar Mesa', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.mesas.index') }}">Volver</a>
    </div>
</div>
@stop



