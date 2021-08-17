<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario...']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo del usuario...']) !!}

    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<h2 class="h5">Listado de roles</h2>
<div class="form-group">
    @foreach ($roles as $role)
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>
    @endforeach

</div>


