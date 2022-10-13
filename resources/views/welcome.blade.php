<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Taller Endesyc Oruro</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icono.png')}}">
         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("../images/auto10.gif");
                background-attachment: fixed;
                background-position: center;
                background-size: 945px;
                /*
                945px y auto10
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                 height: 100vh;
                margin: 0;*/
            }

            .full-height {
                 height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
                color: #fff;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<body>


<div class="contanier">
    
<img src="{{asset('images/taller1.png')}}" class="img-fluid" width="200" loading="lazy">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Inicio</a>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                <!--
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif -->
            @endauth
        </div>
    @endif
    <br>
    <div class="container" text-align="center">
       <center>
        <div class="title m-b-md">
            TALLER MECANICO ENDESYC ORURO
        </div>
        </center>

        <div class="card text-white bg-transparent mb-3 border-white float-start" style="max-width: 18rem;">
        <a class="" href="{{ url('https://www.endesyc.bo/') }}">   
            <img src="{{asset('images/logosyc2.png')}}"  class="card-img-top" alt="Ende SYC">
        </a>
        
          <!--  <div class="card-header border-white">Header</div> -->
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">ENDE S&C</h5>
                    <p class="card-text" style="text-align: justify;">Taller mecánico y/o de maestranza que brinda servicios a nuestros principales clientes.</p>
                </div>
            <div class="card-footer bg-transparent border-white"style="text-align: center;">Taller de Oruro - 2022</div>
        </div>

        <div class="card text-white bg-transparent mb-3 border-white float-end" style="max-width: 18rem;">
        <a class="" href="{{ url('https://www.deoruro.bo/') }}"> 
            <img src="{{asset('images/oruro.png')}}" class="card-img-top" alt="Ende deOruro" width="105" height="100">
        </a>
          <!--  <div class="card-header border-white">Header</div> -->
                <div class="card-body">
                    <br>
                    <h5 class="card-title" style="text-align: center;">ENDE DEORURO</h5>
                    <p class="card-text" style="text-align: justify;">Cliente principal del taller, empresa distribuidora de energia electrica de la ciudad de Oruro.</p>
                </div>
            <div class="card-footer bg-transparent border-white"style="text-align: center;">Taller de Oruro - 2022</div>
        </div>

    </div>
</div>
<br>
<marquee behavior="scroll" direction="left">
    <img src="{{asset('images/ende.png')}}" width="120" height="80" alt="ende" />
    <img src="{{asset('images/endesyc.png')}}" width="120" height="80" alt="endesyc" />
    <img src="{{asset('images/oruro.png')}}" width="120" height="80" alt="deoruro" />
    <img src="{{asset('images/andina.png')}}" width="120" height="80" alt="andina" />
    <img src="{{asset('images/lapaz.png')}}" width="120" height="80" alt="delapaz" />
    <img src="{{asset('images/tecnologias.png')}}" width="120" height="80" alt="tecnologias" />
    <img src="{{asset('images/elfec.png')}}" width="120" height="60" alt="elfec" />
    <img src="{{asset('images/corani.png')}}" width="120" height="80" alt="corani" />
    <img src="{{asset('images/beni.png')}}" width="120" height="80" alt="beni" />
    
 </marquee>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
