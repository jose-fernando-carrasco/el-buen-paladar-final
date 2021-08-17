<div class="card text-dark bg-light mt-3 mb-3">

    <div class="card-header">
        <input class="form-control" placeholder="Ingrese el nombre de una usuario" wire:model="search">
    </div>


  {{--   <div class="card-tools ml-3 mt-2">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoUsuario" id="tipo0" value="todos" checked
                wire:model="tipo">
            <label class="form-check-label" for="tipo0">Todos</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoUsuario" id="tipo1" value="cliente"
                wire:model="tipo">
            <label class="form-check-label" for="tipo1">Clientes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoUsuario" id="tipo2" value="cajero"
                wire:model="tipo">
            <label class="form-check-label" for="tipo2">Cajeros</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoUsuario" id="tipo3" value="gerente"
                wire:model="tipo">
            <label class="form-check-label" for="tipo3">Gerentes</label>
        </div>

    </div> --}}

    @if ($usuarios->count())


        <div class="card-body">

            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.usuarios.edit', $usuario) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST">
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
        <div class="card-footer">
            {{ $usuarios->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif




</div>
