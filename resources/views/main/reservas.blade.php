<x-app-layout class="bg-gray-500">

    <x-navbar/>
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif



  {!! Form::open(['route' => 'admin.reservas.store', 'autocomplete' => 'off', 'files' => false]) !!}


    <div class="card">
        <h3 class="sub-heading"> Reservacion de Mesas </h3>
            <h1 class="heading"> seleccione sus mesas </h1>



        <section class="menu" id="reservas">
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha:') !!}
                {!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Fecha De La Reserva']) !!}

                @error('fecha')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                {!! Form::label('hora', 'Hora:') !!}
                {!! Form::time('hora', null, ['class' => 'form-control', 'placeholder' => 'Hora De La Reserva']) !!}

                @error('hora')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                {!! Form::label('id', 'Id:') !!}
                {!! Form::text('id', auth()->user()->id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('Nombre', 'Nombre:') !!}
                {!! Form::text('nombre', auth()->user()->name, ['class' => 'form-control']) !!}
                </div>
            <div class="box-container">

               @foreach ($mesas as $mesa)
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('img/mesas2.jpg') }}" alt="" >
                    </div>
                    <div class="content">
                        <h3>Mesa {{$mesa->id}}</h3>
                        <p>Esta mesa tiene para una capacidad de {{$mesa->capacidad}} persona</p>
                        <br>
                        <p>Seleccione</p>
                        {!! Form::checkbox('mesas[]',$mesa->id,null,['class'=>'mr-l','id'=>$mesa->id]) !!}
                    </div>
                </div>
                @endforeach

            </div>
           <br>

            {!! Form::submit('Crear reserva', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </section>

</div>

    <!--fin de reservas-->
    <x-footer/>


</x-app-layout>
