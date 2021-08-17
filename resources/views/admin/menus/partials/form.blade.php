<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Menu...']) !!}

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('dia', 'Dia:') !!}
    {!! Form::text('dia', null, ['class' => 'form-control', 'placeholder' => 'Dia...']) !!}

    @error('dia')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-wight-bold">Estado: </p>

    <label class="mr-2">
        {!! Form::radio('estado', 0, true) !!}
        Inactivo
    </label>
    <label>
        {!! Form::radio('estado', 1) !!}
        Activo
    </label>
    @error('estado')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
