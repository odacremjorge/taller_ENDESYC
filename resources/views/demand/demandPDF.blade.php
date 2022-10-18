<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Solicitud</title>

    <!-- Scripts -->
    <script src="{{ asset('js/demand.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/demandPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

</head>
<body>
    <img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
    
       
                            
            <h4><center> N° {{$demands->id}}</center></h4>
                                
                            
                  
    </div>
    <br><br>
    <center><h5>SOLICITUD DE MANTENIMIENTO</h5></center>
    <center><a style="font-size:12px">Unidad de Mantenimiento y Reparación de Vehículos y Equipos</a></center>
    <br>
    @php
        
        $jobs=json_decode($demands->jobDemand);
        $cont=1; 
    @endphp
    <div class="cajaOT">
        <center><h5>Datos Generales:</h5></center>
        <h5>Conductor: <a>{{ $demands->driver_demand }}</a></h5>
        <h5>Sección: <a>{{ $demands->section_demand }}</a></h5>
        <h5>Centro de Costos: <a>{{ $demands->ccDemand }}</a></h5>
        <h5>Fecha de Ingreso al taller: <a>{{ $demands->date_demand }}</a></h5>
    </div>
    <div class="cajaOT">
        <center><h5>Datos del Vehículo:</h5></center>
        <h5>Compañia: <a>{{ $vehicle->cia }}</a></h5>
        <h5>Placa: <a>{{ $vehicle->plate }}</a></h5>
        <h5>Tipo: <a>{{ $vehicle->type }}</a></h5>
        <h5>Kilometraje: <a>{{ $demands->mileage_demand }}</a></h5>
    </div>

    <h5>Descripción de la Falla, Sintomas y Trabajos Solicitados:</h5> 
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th style="width:70%">Descripción</th>
                <th>¿Realizado?</th>
                <th>Costo</th>
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($jobs->jobDemand as $record)
            <tr>
                <td style="font-weight: bold">{{$cont}}</td>
                <td style="text-align: justify">{{$record}}</td>
                <td>SI | NO </td>
                <td></td>
            </tr>
            @php
            $cont=$cont+1;
            @endphp
        @endforeach
        @if ($cont < "20")
        @for ($i = $cont; $i <=10; $i++)
            <tr>
                <td style="font-weight: bold">{{$i}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endfor
        @endif   
                          
    </tbody>
                
</table>  
        
        <h5>Otras Fallas Detectadas por el Taller:</h5> 
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th style="width:70%">Descripción</th>
                <th>¿Realizado?</th>
                <th>Costo</th>
            </tr>
        </thead>   
        <tbody>
        @for ($i = 1; $i <=10; $i++)
        <tr>
            <td style="font-weight: bold">{{$i}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endfor  
        </tbody>
                    
    </table>
<h5 style="color:red">NOTA: Otras fallas detectadas por el taller deberian ser autorizadas por el responsable de ENDESYC para su reparación.</h5> 
<br>
<div class="caja2">
    <center><h5 style="font-size:14px">Observaciones:</h5></center>
    <a>...............................................................................................................................................................................</a>
    <a>...............................................................................................................................................................................</a>
    <a>...............................................................................................................................................................................</a>
    <a>...............................................................................................................................................................................</a>
   
</div>
<br><br><br><br><br><br><br><br>
<div class="caja5">
    <br><br>
<center><h3>Solicitado por: <a>{{$demands->driver_demand}}</a></h3></center>
</div>
<div class="caja6">
<br><br>
<center><h3>Verificado por: <a></a></h3></center>
</div>
<div class="caja6">
    <br><br>
    <center><h3>Aprobado por: <a>{{Auth::user()->name}}</a></h3></center>
</div>
<br><br><br><br><br><br>
<h5 style="color:rgb(2, 10, 53)">RECIBIDO EN TALLER POR:<a>.....................................................................................................................................................................................</a></h5> 

</body>

</html>