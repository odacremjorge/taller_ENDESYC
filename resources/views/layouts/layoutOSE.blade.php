<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Taller Ende SYC Oruro</title>
    <link rel="shortcut icon" href="{{asset('images/icono.png')}}">
    @yield('myscripts')
     
    

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/oses.css') }}" rel="stylesheet">
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
 
     <!-- Bootstrap -->
    
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>   -->
        
    
    
   
</head>

<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <a class="navbar" href="{{ url('/') }}" >
                    <img src="{{asset('images/logo.png')}}" width="120" loading="lazy">
        </a>

       {{ 'Taller Mecánico de ENDE Servicios y Construcciones Regional Oruro' }}
                
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fas fa-tools"></i>
            <h4>Taller de Oruro</h4>
        </div>

        <div class="options__menu">	

            <a href="{{ url('/home') }}" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="{{ url('/ot') }}">
                <div class="option">
                    <i class="far fa-file" title="Ordenes"></i>
                    <h4>Ordenes</h4>
                </div>
            </a>
            
            <a href="{{ route('vehicle.index') }}">
                <div class="option">
                    <i class="fas fa-car" title="Vehiculos"></i>
                    <h4>Vehículos</h4>
                </div>
            </a>

            <a href="{{ url('/operator') }}">
                <div class="option">
                    <i class="fas fa-user-cog" title="Operadores"></i>
                    <h4>Operadores/Clientes</h4>
                </div>
            </a>

            <a href="{{ url('/record') }}">
                <div class="option">
                    <i class="far fa-file-excel" title="Historiales"></i>
                    <h4>Historiales</h4>
                </div>
            </a>

            <a href="{{ url('/demand') }}">
                <div class="option">
                    <i class="far fa-file-word" title="Solicitudes"></i>
                    <h4>Solicitudes</h4>
                </div>
            </a>
            
            @if ( Auth::user()->role == 'ADMINISTRADOR')
            <a href="{{ url('/report') }}">
                <div class="option">
                    <i class="far fa-file-pdf" title="Informes"></i>
                    <h4>Informes</h4>

                </div>
            </a>
            @if ( Auth::user()->name == 'Jorge Mercado')
            <a href="{{ route('users.index') }}">
                <div class="option">
                    <i class="far fa-user" title="Usuarios"></i>
                    <h4>Usuarios</h4>

                </div>
            </a>
            @endif
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <div class="option">
                    <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesión</h4>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
            </a>

        </div>

    </div>

    <!--Container Main start-->
    
    </div>

 
        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> -->
    @yield('js')
  
<!-- <script src="js/jquery.js"></script>
<script src="js/jquery.slicebox.js"></script>

<script src="js/script.js"></script> -->
</html>