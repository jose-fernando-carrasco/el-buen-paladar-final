<div class="form-group">
    {!! Form::label('capacidad', 'Capacidad:') !!}
    {!! Form::number('capacidad', null, ['class' => 'form-control', 'placeholder' => 'Capacidad De Persona De La Mesa...']) !!}

    @error('capacidad')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group ">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    {!! Form::textarea('ubicacion', null, ['class' => 'form-control', 'rows'=> 5 , 'placeholder' => 'ubicacion de la mesa...']) !!}

    @error('ubicacion')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>




