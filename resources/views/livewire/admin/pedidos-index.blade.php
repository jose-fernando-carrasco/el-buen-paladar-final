<div>
    <div class="card">
        <div class="card-body">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pedido1" id="filtrar1" value="Mesas" checked
                    wire:model="filtrar">
                <label class="form-check-label" for="filtrar1">En Mesa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pedido1" id="filtrar2" value="Pedidos"
                    wire:model="filtrar">
                <label class="form-check-label" for="filtrar2">Para Llevar</label>
            </div>
        </div>
    </div>
    @if ($filtrar == 'Mesas')

        <div class="container-fluid ">
            <div class="row ">

                <div class="col-1 "> {{-- Primeara Columna --}}
                    <h4 class="text-info">Mesas</h4>
                    <div class="btn-group-vertical btn-group-lg " role="group"
                        aria-label="Basic radio toggle button group">

                        @foreach ($mesas as $mesa)
                            <button type="button" class=" btn
                            @if ($activo==$mesa->id) btn-outline-secondary
                            @else
                                @if ($mesa->mesaable_id)
                                    btn-danger
                                @else
                                    btn-secondary @endif

                                    @endif "
                                    wire:click="mesa({{ $mesa->id }})">
                                    {{ $mesa->id }}
                            </button>
                        @endforeach


                    </div>
                </div>

                <div class="col-5 mt-5 "> {{-- Segunda Columna --}}

                    <div class="card  ">
                        @isset($activo)
                            <div class="card-header text-center">
                                <h2 class="float-left">Mesa {{ $activo }}</h2>
                                <button class="btn btn-warning   border border-secondary float-right" wire:click="nuevo">
                                    Agregar Pedido
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <th>#</th>

                                        <th>Hora</th>
                                        <th>estado</th>
                                        <th colspan="2"></th>
                                    </thead>
                                    <tbody>
                                        @if ($pedidos->count())
                                            @foreach ($pedidos as $pedido1)
                                                <tr>
                                                    <td>Pedido {{ $loop->iteration }}</td>

                                                    <td>{{ \Carbon\Carbon::parse($pedido1->fecha)->format('H:i') }}</td>
                                                    <td>{{ $pedido1->estado }}</td>
                                                    <td width="10px">
                                                        <button class="btn btn-primary btn-sm"
                                                            wire:click="editar({{ $pedido1->id }})">Editar</button>
                                                    </td>
                                                    <td width="10px">
                                                        <button class="btn btn-danger btn-sm"
                                                            wire:click="cancelar({{ $pedido1->id }})">Cancelar</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <h4>No hay pedidos para la mesa</h4>
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>


                        @else
                            <div class="card-body">
                                <div class="card bg-dark text-white">
                                    <img src="{{ Storage::url('mesa.jpg') }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h1>EL BUEN PALADAR</h1>
                                        <br>
                                        <p class="card-text ">Seleccione una mesa</p>
                                    </div>
                                </div>
                            </div>
                        @endisset


                    </div>

                    <div> {{-- Tercera Columan --}}

                        @isset($pedido)
                            @if ($vacio == 'no')
                                <div class="card">
                                    <div class=" card-header text-center">
                                        <h2>Alimentos del Pedido</h2>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <thead class="text-white table-dark">
                                            <tr>

                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alimentos as $alimento)
                                                <tr>

                                                    <td><img class="rounded-pill" width="150px" height="100px"
                                                            style="object-fit: cover" src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                                                    @else
                                                        {{ Storage::url('SinPlato.jpg') }} @endif" alt="No
                                                        Image">
                                                    </td>
                                                    <td>{{ $alimento->nombre }}</td>
                                                    <td>{{ $alimento->precio }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm"
                                                            wire:click="quitar({{ $alimento }})">Quitar</button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            @endif

                        @endisset

                    </div>
                </div>

                <div class="col-6"> {{-- Cuarta Columan --}}
                    @isset($pedido)
                        <div class="card text-dark bg-light mt-3 mb-3">

                            <div class="card-header text-center">
                                <h2>Añadir Alimentos</h2>
                                <input class="form-control" placeholder="Ingrese el nombre de un pedido"
                                    wire:model="search">
                            </div>

                            <div class="card-tools ml-3 mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo0"
                                        value="Todos" checked wire:model="tipo">
                                    <label class="form-check-label" for="tipo0">Todos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo1"
                                        value="PlatoFuerte" wire:model="tipo">
                                    <label class="form-check-label" for="tipo1">Plato Fuerte</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo2"
                                        value="Bebida" wire:model="tipo">
                                    <label class="form-check-label" for="tipo2">Bebidas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo3"
                                        value="Ensalada" wire:model="tipo">
                                    <label class="form-check-label" for="tipo3">Ensaladas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo4"
                                        value="Postre" wire:model="tipo">
                                    <label class="form-check-label" for="tipo4">Postres</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Tipoalimento" id="tipo5" value="Sopa"
                                        wire:model="tipo">
                                    <label class="form-check-label" for="tipo5">Sopas</label>
                                </div>

                            </div>

                            @if ($alimentoTodos->count())
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead class="text-white table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Imagen</th>
                                                <th class="text-center">Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alimentoTodos as $alimento1)
                                                <tr>
                                                    <td class="text-center">{{ $alimento1->id }}</td>
                                                    <td class="text-center"><img class="rounded-pill" width="200px"
                                                            height="100px" style="object-fit: cover" src="@if ($alimento1->imagen) {{ Storage::url($alimento1->imagen) }}
                                                    @else
                                                        {{ Storage::url('SinPlato.jpg') }} @endif" alt="No
                                                        Image">
                                                    </td>
                                                    <td class="text-center">{{ $alimento1->nombre }}</td>
                                                    <td>{{ $alimento1->precio }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm"
                                                            wire:click="agregar({{ $alimento1 }})">Agregar</button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    {{ $alimentoTodos->links() }}
                                </div>
                            @else
                                <div class="card-body">
                                    <strong>No hay ningun registro</strong>
                                </div>
                            @endif
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($pedidos->count()) {{-- Pedidos Llevar --}}
            <div class="card">
                <div class="card-head">
                    <button class="btn btn-warning   border border-secondary mt-3 ml-3" wire:click="nuevoLlevar">
                        Agregar Pedido
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <th>#</th>

                            <th>Hora</th>
                            <th>estado</th>
                            <th colspan="2"></th>
                        </thead>
                        <tbody>

                            @foreach ($pedidos as $pedido1)
                                <tr>
                                    <td>{{ $pedido1->id }}</td>

                                    <td>{{ \Carbon\Carbon::parse($pedido1->fecha)->format('H:i') }}</td>
                                    <td>{{ $pedido1->estado }}</td>
                                    <td width="10px">
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="editarLlevar({{ $pedido1->id }})">Editar</button>
                                    </td>

                                    <td width="10px">
                                        <button class="btn btn-danger btn-sm"
                                            wire:click="cancelar({{ $pedido1->id }})">Cancelar</button>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $pedidos->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun registro</strong>
            </div>
        @endif

        @isset($pedidoLlevar)
            @if ($vacio == 'no')
                <div class="card">
                    <div class=" card-header text-center">
                        <h2>Alimentos del Pedido</h2>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="text-white table-dark">
                            <tr>

                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alimentos as $alimento)
                                <tr>

                                    <td><img class="rounded-pill" width="150px" height="100px" style="object-fit: cover"
                                            src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                                    @else
                                        {{ Storage::url('SinPlato.jpg') }} @endif" alt="No
                                        Image">
                                    </td>
                                    <td>{{ $alimento->nombre }}</td>
                                    <td>{{ $alimento->precio }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="quitar({{ $alimento }})">Quitar</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @endif

        @endisset
        @isset($pedidoLlevar)
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

                @if ($alimentoTodos->count())
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="text-white table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alimentoTodos as $alimento1)
                                    <tr>
                                        <td class="text-center">{{ $alimento1->id }}</td>
                                        <td class="text-center"><img class="rounded-pill" width="200px" height="100px"
                                                style="object-fit: cover" src="@if ($alimento1->imagen) {{ Storage::url($alimento1->imagen) }}
                                        @else
                                            {{ Storage::url('SinPlato.jpg') }} @endif" alt="No
                                            Image">
                                        </td>
                                        <td class="text-center">{{ $alimento1->nombre }}</td>
                                        <td>{{ $alimento1->precio }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                wire:click="agregar({{ $alimento1 }})">Agregar</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $alimentoTodos->links() }}
                    </div>
                @else
                    <div class="card-body">
                        <strong>No hay ningun registro</strong>
                    </div>
                @endif
            @endisset
    @endif

</div>
