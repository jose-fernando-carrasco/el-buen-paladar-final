<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/EstilosDelLogin.css') }}">


    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body>
    <div class="container">

        <div class="error">
            <ul class="error-content">
                @foreach ($errors->all() as $error)
                    <li><small>{{ $error }}</small></li>
                @endforeach

            </ul>
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



        {{-- Portadas --}}
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="https://www.linguahouse.com/linguafiles/md5/d01dfa8621f83289155a3be0970fb0cb" alt="">
                <div class="text">
                    <span class="text-1">Cada comida es una <br> nueva experiencia</span>
                    <span class="text-2">No te lo puedes perder</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="https://cdn.pixabay.com/photo/2015/09/14/11/43/restaurant-939435_960_720.jpg"
                    alt="">
                <div class="text">
                    <span class="text-1">Ingrea a un nuevo<br> mundo de sabor</span>
                    <span class="text-2">Comenzemos!!</span>
                </div>
            </div>
        </div>

        <div class="forms">
            <div class="form-content">

                {{-- Login --}}

                <div class="login-form">
                    <div class="title">Ingresar</div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email" name="email" placeholder="Ingrese tu email" required
                                    autofocus>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input id="password" type="password" name="password" placeholder="Ingresa tu contraseña"
                                    required autocomplete="current-password">
                            </div>
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm ">{{ __('Recuerdame') }}</span>
                                </label>
                            </div>


                            <div class="button input-box">
                                <input type="submit" value="Acceder">
                            </div>
                            <div class="text sign-up-text">
                                No tienes una cuenta?
                                <label for="flip">
                                    Registrate
                                </label> 

                            </div>
                        </div>
                    </form>
                </div>

                {{-- Registrarse --}}

                <div class="signup-form">
                    <div class="title">Registrate</div>
                    <form  action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input  type="text" name="name" placeholder="Ingrese su nombre" required :value="old('name')" autocomplete="name" >
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Ingrese su email" required :value="old('email')">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Ingrese su contraseña" required autocomplete="new-password">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
                                    required autocomplete="new-password">
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Registrar">
                            </div>
                            <div class="text sign-up-text">Ya tienes una cuenta? <label for="flip">Accede ahora</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
