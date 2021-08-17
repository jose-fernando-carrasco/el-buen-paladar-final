@extends('adminlte::page')

@section('title', 'El Buen Paladar')

@section('content_header')
<h1>Crear Nuevo Alimento</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.alimentos.store', 'autocomplete' => 'off', 'files' => true]) !!}

        @include('admin.alimentos.partials.form')

        {!! Form::submit('Crear Alimento', ['class' => 'btn btn-primary']) !!}

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
    //Cambiar Imagen
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
