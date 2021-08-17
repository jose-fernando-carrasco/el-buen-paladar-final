<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @foreach ($array as $alimentos)
            <h1 class="text-center font-bold text-5xl my-3 underline text-green-700">Pedido {{ $loop->iteration }}  Fecha: {{$fechas[($loop->iteration)-1]}} </h1>
            <x-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Imagen
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>


                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($alimentos as $alimento)

                            <tr>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{-- {{ $alimento->id }} --}}
                                        <img class="" width="150px" height="100px" style="object-fit: cover"
                                            src="@if ($alimento->imagen) {{ Storage::url($alimento->imagen) }}
                                        @else
                                        {{ Storage::url('SinPlato.jpg') }} @endif" alt="No Image">
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $alimento->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $alimento->precio }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table>
        @endforeach

    </div>
</div>
