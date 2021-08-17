<div>
    <div>
        <input type="text" class="ml-3  float-right items-center mt-2" width="20px" wire:model="llevar">
        <button class="btn btn-warning  btn-lg float-right border border-secondary mb-3" wire:click="agregarllevar" >Agregar Cuenta</button>

    </div>
    <div class="btn-group btn-group-lg" role="group">
        @foreach ($mesas as $mesa)
            <button type="button" class="btn btn-outline-secondary"
                wire:click="crear({{ $mesa->id }})">{{ $mesa->id }}</button>
        @endforeach
    </div>

    <div class="card text-dark bg-light mt-3 mb-3"> {{-- Cuentas de Hoy --}}
        <div class="card-header">
            <input class="form-control" placeholder="Ingrese el Id de la cuenta" wire:model="search">
        </div>
        @if ($cuentas->count())
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="text-white table-dark">
                        <tr>
                            <th>#</th>
                            <th>Hora</th>
                            <th>Tipo</th>
                            {{-- <th>Total</th> --}}

                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>Cuenta #{{ $cuenta->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($cuenta->created_at)->format('H:i') }}</td>
                                <td>{{ $cuenta->tipo }}</td>
                                {{-- <td>{{ $cuenta->total }} </td> --}}
                                <td width="10px">
                                    <button class="btn btn-primary btn-sm"
                                        wire:click="ver({{ $cuenta->id }})">Ver</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                {{ $cuentas->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun registro</strong>
            </div>
        @endif
    </div>

    @isset($cuenta1) {{-- Vista de cada cuenta --}}

        @foreach ($array as $alimentos)

            <div class="card text-dark bg-light mt-3 mb-3">
                <div class="card-header text-center">
                    <h3>Pedido {{ $loop->iteration }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="text-white table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th class="text-center">Nombre</th>
                                <th>Precio</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alimentos as $alimento)
                                <tr>
                                    <td class="text-center">{{ $alimento->id }}</td>
                                    <td class="text-center"><img class="rounded-pill" width="150px" height="100px"
                                            style="object-fit: cover" src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                                    @else
                                        {{ Storage::url('SinPlato.jpg') }} @endif" alt="No Image"></td>
                                    <td class="text-center">{{ $alimento->nombre }}</td>
                                    <td>{{ $alimento->precio }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>


        @endforeach

        <div class="card text-white bg-dark mb-3 float-right">
            <div class="card-header">
                <h2>TOTAL</h2>
            </div>
            <div class="card-body text-center">
                <h1>{{ $suma }}</h1>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-lg" href="#{{-- {{ route('admin.menus.edit', $menu) }} --}}">Facturar</a>
            </div>

        </div>

    @endisset


</div>
