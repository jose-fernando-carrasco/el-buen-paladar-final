<div>

    <div class="card text-center">
        <div class="card-header">
            <h2>Alimentos del Menu</h2>
            <input class="form-control" placeholder="Ingrese el nombre de un alimento" wire:model="search1">
        </div>
        <div class="card-tools ml-3 mt-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento0" id="tipo0-0" value="Todos" checked
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo0-0">Todos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento1" id="tipo1-1" value="PlatoFuerte"
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo1-1">Plato Fuerte</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento2" id="tipo2-2" value="Bebida"
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo2-2">Bebidas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento3" id="tipo3-3" value="Ensalada"
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo3-3">Ensaladas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento4" id="tipo4-4" value="Postre"
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo4-4">Postres</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Tipoalimento5" id="tipo5-5" value="Sopa"
                    wire:model="tipo1">
                <label class="form-check-label" for="tipo5-5">Sopas</label>
            </div>

        </div>
        @if ($alimentosMenu->count())
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-light">

                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($alimentosMenu as $alimento1)

                            <tr>

                                <td>{{ $alimento1->nombre }}</td>
                                <td><img class="img-thumbnail " width="150px" height="150px" style="object-fit: cover"
                                        src="@if ($alimento1->imagen) {{ Storage::url($alimento1->imagen) }}
                                            @else{{ Storage::url('SinPlato.jpg') }} @endif" alt="No Image"></td>
                                <td>{{ $alimento1->precio }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" wire:click="quitar({{$alimento1}})">Quitar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $alimentosMenu->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun registro</strong>
            </div>
        @endif

    </div>

</div>
