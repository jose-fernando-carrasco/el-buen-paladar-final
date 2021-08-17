<div class="card text-dark bg-light mt-3 mb-3">

    <div class="card-header">
        <input class="form-control" placeholder="Ingrese el nombre de un alimento" wire:model="search">
    </div>
    
    <div class="card-tools ml-3 mt-2">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo0" value="Todos" checked
                wire:model="tipo">
            <label class="form-check-label" for="tipo0">Todos</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo1" value="PlatoFuerte"
                wire:model="tipo">
            <label class="form-check-label" for="tipo1">Plato Fuerte</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo2" value="Bebida" wire:model="tipo">
            <label class="form-check-label" for="tipo2">Bebidas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo3" value="Ensalada"
                wire:model="tipo">
            <label class="form-check-label" for="tipo3">Ensaladas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo4" value="Postre"
                wire:model="tipo">
            <label class="form-check-label" for="tipo4">Postres</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="TipoAlimento" id="tipo5" value="Sopa"
                wire:model="tipo">
            <label class="form-check-label" for="tipo5">Sopas</label>
        </div>

    </div>

    @if ($alimentos->count())

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descipcion</th>
                        <th>Precio</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alimentos as $alimento)
                        <tr>
                            <td>{{ $alimento->id }}</td>
                            <td><img class="rounded-pill" width="300px" height="150px" style="object-fit: cover" src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                            @else
                                {{ Storage::url('SinPlato.jpg') }} @endif" alt="No Image"></td>
                            <td>{{ $alimento->nombre }}</td>
                            <td>{!! $alimento->descripcion !!}</td> {{-- CKEditor Escapar Etiquetas --}}
                            <td>{{ $alimento->precio }}</td>
                            <td width="10px">

                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.alimentos.edit', $alimento) }}">Editar</a>

                            </td>
                            <td width="10px">

                                <form action="{{ route('admin.alimentos.destroy', $alimento) }}" method="POST">
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
            {{ $alimentos->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>
