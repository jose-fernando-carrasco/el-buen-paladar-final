<div class="card text-dark bg-light mt-3 mb-3">

    @if ($reservas->count())

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mesas</th>
                        <th>Estado</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td> {{ $reserva->nombre}}</td>
                            <td>{{ $reserva->fecha}}</td>
                            <td>{{ $reserva->hora }}</td>
                            <td>Las mesas reservadas {{ $reserva->mesas()->pluck('id') }}</td>

                            <td width="10px">
                                @if($reserva->mesas()->pluck('status')[0] == false)

                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.reservas.show', $reserva)}}">Confirmar Reserva</a>


                            @endif
                            </td>

                            <td width="10px">

                                <form action="{{ route('admin.reservas.destroy',$reserva) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>

