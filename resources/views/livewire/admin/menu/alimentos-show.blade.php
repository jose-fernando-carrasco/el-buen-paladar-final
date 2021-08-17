<div>
    <div class="card text-dark bg-light mt-3 mb-3">

        <div class="card-header text-center">
            <h2>Añadir Alimentos</h2>
            <input class="form-control" placeholder="Ingrese el nombre de un alimento" wire:model="search">
        </div>

        <div class="card-tools ml-3 mt-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo0" value="Todos" checked
                    wire:model="tipo">
                <label class="form-check-label" for="tipo0">Todos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo1" value="PlatoFuerte"
                    wire:model="tipo">
                <label class="form-check-label" for="tipo1">Plato Fuerte</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo2" value="Bebida"
                    wire:model="tipo">
                <label class="form-check-label" for="tipo2">Bebidas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo3" value="Ensalada"
                    wire:model="tipo">
                <label class="form-check-label" for="tipo3">Ensaladas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo4" value="Postre"
                    wire:model="tipo">
                <label class="form-check-label" for="tipo4">Postres</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo5" value="Sopa"
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
                            <th class="text-center">Nombre</th>
                            <th>Precio</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alimentos as $alimento)
                            <tr>
                                <td class="text-center">{{ $alimento->id }}</td>
                                <td class="text-center"><img class="rounded-pill" width="200px" height="100px" style="object-fit: cover"
                                        src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                                @else
                                    {{ Storage::url('SinPlato.jpg') }} @endif" alt="No Image"></td>
                                <td class="text-center">{{ $alimento->nombre }}</td>
                                <td>{{ $alimento->precio }}</td>
                                <td >
                                    <button class="btn btn-primary btn-sm" wire:click="agregar({{$alimento}})">Agregar</button>
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
</div>
