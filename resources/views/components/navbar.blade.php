<div class="border-8 my-8  border-transparent  ">

    <nav class="bg-white  rounded-full ring-4 ring-transparent mx-5">
        <div class="container px-6 py-4 mx-auto">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    {{-- Logotipo --}}
                    <div class="text-xl font-semibold text-gray-700 my-2 ">
                        <a href="{{ route('main.platillos') }}" style="font-family: 'MonteCarlo', cursive;"
                            class="border-4 border-double rounded-lg border-gray-500 p-1 text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                            href="#">El Buen Paladar</a>
                    </div>

                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="flex-1 md:flex md:items-center md:justify-between">
                    <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8 ">
                        <a href="{{ route('main.platillos') }}" class="px-2 py-1 mx-2 mt-2 text-lg font-medium
                            {{ request()->routeIS('main.platillos') ? 'bg-gray-500 text-white' : 'text-gray-700 ' }} transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200
                            hover:bg-gray-500 hover:text-white dark:hover:bg-gray-700">PLATILLOS</a>

                        <a href="{{ route('main.bebidas') }}" class="px-2 py-1 mx-2 mt-2 text-lg font-medium
                            {{ request()->routeIS('main.bebidas') ? 'bg-gray-500 text-white' : 'text-gray-700 ' }} transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200
                        hover:bg-gray-500 hover:text-white dark:hover:bg-gray-700">BEBIDAD</a>

                        <a href="{{ route('main.postres') }}" class="px-2 py-1 mx-2 mt-2 text-lg font-medium
                            {{ request()->routeIS('main.postres') ? 'bg-gray-500 text-white' : 'text-gray-700 ' }} transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200
                        hover:bg-gray-500 hover:text-white dark:hover:bg-gray-700">POSTRES</a>

                        <a href="{{ route('main.especiales') }}" class="px-2 py-1 mx-2 mt-2 text-lg font-medium
                            {{ request()->routeIS('main.especiales') ? 'bg-gray-500 text-white' : 'text-gray-700 ' }} transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200
                        hover:bg-gray-500 hover:text-white dark:hover:bg-gray-700">ESPECIALES</a>
                        <a href="{{ route('main.reservas') }}" class="px-2 py-1 mx-2 mt-2 text-lg font-medium
                            {{ request()->routeIS('main.reservas') ? 'bg-gray-500 text-white' : 'text-gray-700 ' }} transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200
                        hover:bg-gray-500 hover:text-white dark:hover:bg-gray-700">RESERVAR</a>
                    </div>

                    <div class="flex items-center mt-4 md:mt-0">

                        {{-- Campanita de notificacion --}}
                        <div x-data="{ dropdownOpen: false }" class="relative my-5">
                            <button @click="dropdownOpen = !dropdownOpen"
                                class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                                <span class="badge badge-warning navbar-badge">
                                    @if (count(auth()->user()->unreadNotifications))
                                        <span class="badge badge-warning ">
                                            {{ count(auth()->user()->unreadNotifications) }}
                                        </span>
                                    @endif
                                </span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                class="fixed inset-0 h-full w-full z-10"></div>

                            <div x-show="dropdownOpen"
                                class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                @foreach (auth()->user()->unreadNotifications as $notificacion)
                                    <p>la Reserva ya fue creada para {{ $notificacion->data['nombre'] }}</p>
                                @endforeach

                            </div>
                        </div>
                        {{-- Menu desplegable --}}
                        <div class="ml-5 relative" x-data="{open: false}">
                            <div>
                                <button x-on:click="open=true" type="button"
                                    class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">

                                    <img class="h-10 w-10 rounded-full border-2 border-blue-300"
                                        src="{{ auth()->user()->profile_photo_url }}" alt="">
                                </button>
                            </div>


                            <div x-show="open" x-on:click.away="open = false"
                                class="origin-top-right absolute z-10 right-0 mt-2 w-48 bg-gray-300 rounded-md shadow-lg py-1  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">

                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Tu perfil</a>


                                @can('admin.home')
                                    <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Panel de administracion</a>
                                @endcan

                                <a href="{{ route('main.historial') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Tu Historial</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2"
                                        onclick="event.preventDefault();this.closest('form').submit();">
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</div>
