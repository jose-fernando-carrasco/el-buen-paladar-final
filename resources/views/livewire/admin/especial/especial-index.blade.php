<div class="card text-dark bg-light mt-3 mb-3">

    <div class="card-header">
        <input class="form-control" placeholder="Ingrese el nombre de una Oferta Especial" wire:model="search">
    </div>


    @if ($especiales->count())

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Finaliza</th>
                        <th>Estado</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($especiales as $especiale)
                        <tr>
                            <td>{{ $especiale->id }}</td>
                            <td>{{ $especiale->nombre }}</td>
                            <td>{{ $especiale->fecha_inicio }}</td>
                            <td>{{ $especiale->fecha_final }}</td>

                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input " disabled id={{$especiale->id}}
                                     name="example" {{-- wire:click="activar({{$especiale->id}})" --}} @if($especiale->estado == 1) checked @else @endif >
                                    <label class="custom-control-label" for={{$especiale->id}}>@if($especiale->estado == 1)Activo  @else   @endif</label>
                                </div>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.especiales.edit', $especiale) }}">Editar</a>
                            </td>
                            <td width="10px">

                                <form action="{{ route('admin.especiales.destroy', $especiale) }}" method="POST">
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
            {{ $especiales->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>

