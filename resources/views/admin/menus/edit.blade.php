@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
<h1>Editar Menu</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($menu, ['route' => ['admin.menus.update', $menu], 'autocomplete' => 'off', 'method' => 'PUT']) !!}

        @include('admin.menus.partials.form')

        {!! Form::submit('Actualizar Menu', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.menus.index') }}">Volver</a>

    </div>
</div>

@livewire('admin.menu.menus-edit', [ 'menu' => $menu ])
@livewire('admin.menu.alimentos-show', [ 'menu' => $menu ])


@stop

@section('js')
{{-- <script type="text/javascript">
    setTimeout(function(){
        location.reload();
    },5000);
</script> --}}
@endsection
