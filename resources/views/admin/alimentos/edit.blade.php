@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Editar Platillo</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($alimento, ['route' => ['admin.alimentos.update', $alimento], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

        @include('admin.alimentos.partials.form')

        {!! Form::submit('Actualizar Alimento', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <a class="btn btn-warning  btn-lg float-right " href=" {{ route('admin.alimentos.index') }}">Volver</a>
    </div>
</div>
@stop

@section('css')
<style>
    .image-wrapper {
        position: relative;
        padding-bottom: 250px;
    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 500px;
        height: 250px;
    }

</style>
@stop

@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#descripcion'), {
            toolbar: {
                items: [
                    'heading', '|','bold', 'italic','|','link', '|','bulletedList', 'numberedList','|','blockQuote', '|','undo', 'redo'
                ],
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>



<script>

    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
