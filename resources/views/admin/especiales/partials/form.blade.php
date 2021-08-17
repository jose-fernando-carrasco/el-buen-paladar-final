<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Menu Especial...']) !!}

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group w-25" >
    <div class="">
        {!! Form::label('fecha_final', 'Finaliza:') !!}
        {!! Form::date('fecha_final',  \Carbon\Carbon::now(), ['class' => 'form-control ' /* , 'placeholder' => 'Nombre del Menu Especial...' */]) !!}
    </div>
    @error('fecha_final')
        <small class="text-danger ">{{ $message }}</small>
    @enderror
</div>



<div class="form-group ">
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
