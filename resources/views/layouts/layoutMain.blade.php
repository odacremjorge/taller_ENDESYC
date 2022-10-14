<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Ende SYC Oruro</title>
    <link rel="shortcut icon" href="{{asset('images/icono.png')}}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app1.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    <script src="{{ asset('js/tableOperators.js') }}" defer></script>
    <script src="{{ asset('js/canvas.js') }}" defer></script>
    

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
     <!-- Bootstrap -->

    
    
   
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


<br><br>
    <marquee behavior="scroll" direction="left">
        <img src="{{asset('images/suzuki.png')}}" width="120" height="80" alt="suzuki" />
        <img src="{{asset('images/greatwall.png')}}" width="120" height="80" alt="greatwall" />
        <img src="{{asset('images/mazda.png')}}" width="120" height="80" alt="mazda" />
        <img src="{{asset('images/nissan.png')}}" width="120" height="80" alt="nissan" />
        <img src="{{asset('images/ford.png')}}" width="120" height="80" alt="ford" />
        <img src="{{asset('images/honda.png')}}" width="120" height="80" alt="honda" />
        <img src="{{asset('images/jac.png')}}" width="120" height="80" alt="jac" />
        <img src="{{asset('images/toyota.png')}}" width="120" height="80" alt="toyota" />
        <img src="{{asset('images/vw.png')}}" width="120" height="80" alt="vw" />
        <img src="{{asset('images/higer.png')}}" width="120" height="80" alt="higer" />
        <img src="{{asset('images/lada.png')}}" width="120" height="80" alt="lada" />
        <img src="{{asset('images/fiat.png')}}" width="120" height="80" alt="fiat" />
        <img src="{{asset('images/mit.png')}}" width="120" height="80" alt="mit" />
        <img src="{{asset('images/usm.png')}}" width="120" height="80" alt="usm" />
        <img src="{{asset('images/zna.png')}}" width="120" height="80" alt="zna" />
        <img src="{{asset('images/foton.png')}}" width="120" height="80" alt="foton" />
        <img src="{{asset('images/zon.png')}}" width="150" height="80" alt="zon" />
        <img src="{{asset('images/mack.png')}}" width="120" height="80" alt="mack" />
    </marquee>



    <!-- Scripts -->

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<!-- estilos de la tabla -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<!--<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>-->
<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  
<!--<script src="js/jquery.js"></script>
<script src="js/jquery.slicebox.js"></script>

<script src="js/script.js"></script>-->

</body>
</html>