@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<h1>Editar Menu Especial</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($especiale, ['route' => ['admin.especiales.update', $especiale], 'autocomplete' => 'off', 'method' => 'PUT']) !!}

        @include('admin.especiales.partials.form')

        {!! Form::submit('Actualizar Menu Especial', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.especiales.index') }}">Volver</a>

    </div>
</div>

@livewire('admin.especial.especial-edit', [ 'especiale' => $especiale ])
@livewire('admin.especial.especial-alimentos-show', [ 'especiale' => $especiale ])


@stop

@section('js')
{{-- <script type="text/javascript">
    setTimeout(function(){
        location.reload();
    },5000);
</script> --}}
@endsection
