<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'OSE No ' }} {{$oses->id}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/osePDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>

<img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
         <h4><center> OSE N° {{$oses->id}}</center></h4>
    </div>
    <br><br>
        <center><h5>ORDEN DE SERVICIO EXTERNO</h5></center>
        <center><a style="font-size:12px">Unidad de Mantenimiento y Reparación de Vehículos y Equipos</a></center>
    <br>
    @php
        
        $jobs=json_decode($oses->jobOSE);
        $cont=1;
    @endphp
    <div class="caja1">
        <h5>Señores: <a style="font-size:12px">{{ $oses->workshop }}</a></h5>
    </div>
    <div class="caja3">
        <h5>Fecha: <a style="font-size:12px">{{ $oses->DateOSE }}</a></h5>
    </div>
    <div class="caja3">
        <h5>Centro de costos: <a style="font-size:12px">{{ $oses->cost_center }}</a></h5>
    </div>
    <h5>AGRADECEMOS EJECUTAR EL SIGUIENTE TRABAJO:</h5> 
    <table>
        <thead>
            <tr>
                <th style="width:5%">N°</th>
                <th style="width:60%">Descripción</th>
                <th>Costo (Bs.)</th>
                <th>V°B°</th>
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($jobs->job as $record)
            <tr>
                <td style="font-weight: bold">{{$cont}}</td>
                <td style="text-align: justify">{{$record}}</td>
                <td>{{ $oses->price_ose }}</td>
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
    <h5>TRABAJOS ADICIONALES SOLICITADOS POR EL TALLER EXTERNO:</h5> 
    <table>
        <thead>
            <tr>
                <th tyle="width:5%">N°</th>
                <th style="width:45%">Descripción</th>
                <th style="width:15%">Costo (Bs.)</th>
                <th style="width:25%">Personal de ENDESYC</th>
                <th style="width:10%">V°B°</th>
            </tr>
        </thead>              
                   
        <tbody>
        
        @for ($i = 1; $i <=5; $i++)
            <tr>
                <td style="font-weight: bold">{{$i}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endfor
                  
        </tbody>
                    
    </table>
    <h5>DATOS DE LA ORDEN DE TRABAJO:</h5> 
    <div class="caja10">
        <h5 style="font-size:12px">Cliente: <a style="font-size:12px">{{$oses->name_client}}</a></h5>
    </div>
    <div class="caja9">
        <h5 style="font-size:12px">OT: <a style="font-size:12px">{{ $oses->ot_id }}</a></h5>
    </div>
    <div class="caja9">
        <h5 style="font-size:12px">CIA: <a style="font-size:12px">{{ $vehicle->cia }}</a></h5>
    </div>
    <div class="caja8">
        <h5 style="font-size:12px">Placa: <a style="font-size:12px">{{ $vehicle->plate }}</a></h5>
    </div>
    <div class="caja7">
        <h5 style="font-size:12px">Marca: <a style="font-size:12px">{{ $vehicle->mark }}-{{ $vehicle->model }}</a></h5>
    </div>
    <center><h5>FIRMAS DE CONFORMIDAD DE LOS SERVICIOS SOLICITADOS</h5> </center>
    <table class="tableAuto">
        <thead>
            <tr>
                <th style="width:33.33%" >SOLICITANTE</th>
                <th style="width:33.33%">REVISADO</th>
                <th style="width:33.33%">APROBADO</th>
                
            </tr>
        </thead>              
                   
        <tbody>
        
        @for ($i = 1; $i <=1; $i++)
            <tr>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Solicitante:</h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Nombre:</h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Nombre:</h5></td>
                
            </tr>
        @endfor
                  
        </tbody>
                    
    </table>
    
    <center><h5>REGISTRO DE ENTREGA DEL TALLER EXTERNO</h5> </center>
    <table class="tableAuto">
        <thead>
            <tr>
                <th style="width:33.33%" >NOMBRE ENCARGADO</th>
                <th style="width:33.33%">FECHA</th>
                <th style="width:33.33%">FIRMA DE ENTREGA</th>
                
            </tr>
        </thead>              
                   
        <tbody>
        
        @for ($i = 1; $i <=1; $i++)
            <tr>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br></h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br></h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br></h5></td>
                
            </tr>
        @endfor
                  
        </tbody>
                    
    </table>
    <center><h5>CONFORMIDAD DE RECEPCION PERSONAL ENDE SERVICIOS Y CONSTRUCCIONES S.A.</h5> </center>
    <table class="tableAuto">
        <thead>
            <tr>
                <th style="width:25%" >MECANICO</th>
                <th style="width:25%">FECHA</th>
                <th style="width:25%">APROBADO</th>
                <th style="width:25%">AUTORIZADO</th>
                
            </tr>
        </thead>              
                   
        <tbody>
        
        @for ($i = 1; $i <=1; $i++)
            <tr>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Nombre:</h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br></h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Nombre:</h5></td>
                <td style="height: 70px;"><h5 style="text-align:left"> <br><br><br>Nombre:</h5></td>
                
            </tr>
        @endfor
                  
        </tbody>
                    
    </table>
    
    <center><h5 style="color:rgb(211, 8, 8)">____________________________________________________________________________________________________</h5> </center>

    <center><h5 style="color:rgb(211, 8, 8)">La factura debe ser emitida a nombre de: ENDE SERVICIOS Y CONSTRUCCIONES S.A. con NIT. 1020673029</h5> </center>
   
</body>

</html>