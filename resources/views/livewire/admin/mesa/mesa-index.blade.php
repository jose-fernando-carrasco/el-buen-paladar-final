<div class="card text-dark bg-light mt-3 mb-3">

    <div class="card-header">
        <input class="form-control" placeholder="Ingrese el nombre de un cliente" wire:model="search">
    </div>


    @if ($mesas->count())

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Ubicacion</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mesas as $mesa)
                        <tr>
                            <td>{{ $mesa->id }}</td>
                            <td>Mesa {{ $mesa->id }}</td>
                            <td>{{ $mesa->capacidad }}</td>
                            <td>{{ $mesa->ubicacion }}</td>
                            <th>
                                @if($mesa->status == true)
                                    <span style="color: red">Reservado</span>
                                @else
                                    <span style="color: rgb(0, 0, 0)">Libre Para Reserva</span>
                                @endif

                            </th>
                            <td>

                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.mesas.edit', $mesa) }}">Editar</a>
                            </td>
                            <td width="10px">

                                <form action="{{ route('admin.mesas.destroy', $mesa) }}" method="POST">
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

