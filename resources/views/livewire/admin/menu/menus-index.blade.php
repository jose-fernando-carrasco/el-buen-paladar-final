<div class="card text-dark bg-light mt-3 mb-3">

    <div class="card-header">
        <input class="form-control" placeholder="Ingrese el nombre de un Menu" wire:model="search">
    </div>


    @if ($menus->count())

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="text-white table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dia</th>
                        <th>Estado</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->nombre }}</td>
                            <td>{{ $menu->dia }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id={{$menu->id}}
                                     name="example" wire:click="activar({{$menu->id}})" @if($menu->estado == 1) checked @else @endif >
                                    <label class="custom-control-label" for={{$menu->id}}>@if($menu->estado == 1)Activo  @else   @endif</label>
                                </div>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.menus.edit', $menu) }}">Editar</a>
                            </td>
                            <td width="10px">

                                <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST">
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
            {{ $menus->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>
