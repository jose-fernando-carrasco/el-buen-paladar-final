<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del alimento...']) !!}

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group ">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows'=> 5 , 'placeholder' => 'Descripción del alimento...']) !!}

    @error('descripcion')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


    <div class="row mb-3">
        <div class="col-4 image-wrapper ">
                @isset ($alimento->imagen)
                    <img id="picture"  width="500px" height="250px" id="picture" src="{{Storage::url($alimento->imagen)}}" alt="">
                @else
                    <img width="500px" height="250px" id="picture" src="https://st2.depositphotos.com/1001069/5885/i/950/depositphotos_58859641-stock-photo-empty-plate-and-silverware.jpg" alt="">
                @endisset

        </div>
        <div class="col">
                {!! Form::label('file', 'Imagen del alimento') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mt-5">
                    {!! Form::label('tipo_alimento_id', 'Tipo De Alimento  : ') !!}
                    {!! Form::select('tipo_alimento_id', $tipo_alimento_id, null, ['class' => 'form-select']) !!}
                </div>
        </div>

    </div>


<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Precio del alimento...']) !!}

    @error('precio')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


