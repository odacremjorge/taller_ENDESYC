<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Historial CIA No ' }} {{$vehicle->cia}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/recordPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>

@php
        $cont=1; 
        
@endphp
        
<img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
    
       
                            
            <h4><center> CIA N° {{$vehicle->cia}}</center></h4>
                                
                            
                  
    </div>
    <br><br>
    <center><h5>HISTORIAL DE TRABAJOS</h5></center>
    <center><a style="font-size:12px">Unidad de Mantenimiento y Reparación de Vehículos y Equipos</a></center>
    <center><h5>PLANTILLA DE MANTENIMIENTO</h5></center>
    <br>
    <h5>Datos del Vehículo:</h5> 

<div class="caja2">
    <h5>Cia: <a>{{$vehicle->cia}}</a></h5>
    <h5>Placa: <a>{{$vehicle->plate}}</a></h5>
    <h5>Empresa: <a>{{$vehicle->company}}</a></h5>
    <h5>Tipo: <a>{{$vehicle->type}}</a></h5>
    
</div>

<div class="caja2">
    <h5>Marca: <a>{{$vehicle->mark}}</a></h5>
    <h5>Modelo: <a>{{$vehicle->model}}</a></h5>
    <h5>Año: <a>{{$vehicle->year}}</a></h5>
    <h5>Color: <a>{{$vehicle->color}}</a></h5>
    
</div>
<div class="caja2">
<h5>Cilindrada: <a>{{$vehicle->displacement}}</a></h5>
    <h5>Tipo de Motor: <a>{{$vehicle->motor_type}}</a></h5>
    <h5>Serie: <a>{{$vehicle->serie}}</a></h5>
    <h5>Chasis: <a>{{$vehicle->chassis}}</a></h5>
</div>

<br><br><br><br><br>
<table>
        <thead>
            <tr>
                <th>N°</th>
                <th>FECHA</th>
                <th>KILOMETRAJE</th>
                <th>CONDUCTOR</th>
                <th>MANTENIMIENTO</th>
                <th>LUBRICANTE</th>
                <th>CAMBIO DE FILTROS</th>
                <th>OT N°</th>
                <!--<th>REPUESTOS</th>-->
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($record_vehicle as $record)
        <tr>
                <td >{{$cont}}</td>
                <td >{{$record->Date}}</td>
                <td >{{$record->mileage}} Km.</td>
                <td > {{$record->name_operator}}</td>
                <td style="text-align: center">{{$record->maintenance_type}}</td>
                <td >
                    
                {{$record->lublicant}}
                   
                </td>
                <td >{{$record->filter}}</td>
                <td style="color:red">{{$record->id}}</td>
               <!--<td >
                @foreach ($record_replacement as $data)
                    @if ($data->id == $record->id)
                        <h1>- {{$data->amount}} {{$data->unit}} {{$data->description}} </h1>
                    @endif
                @endforeach
                </td>-->
                
              
            </tr>
                     
           
            <!--<tbody style="width: 100%">
                    <tr>
                        <td style="text-align: justify">Repuestos:
                            @foreach ($record_replacement as $data)
                                @if ($data->id == $record->id)
                                    <h1>- {{$data->amount}} {{$data->unit}} {{$data->description}} </h1>
                                @endif
                            @endforeach
                        </td>
                    </tr>
            </tbody>-->
                
            <tr>
                @php
                 $jobs=json_decode($record->job);
                 
                @endphp
                
                <td COLSPAN=8 style="text-align: left">
                    <label>Repuestos: </label>
                    @foreach ($record_replacement as $data)
                                @if ($data->id == $record->id)
                                    <h1>{{$data->amount}} {{$data->unit}} {{$data->description}},  </h1>
                                @endif
                    @endforeach
                    <br>
                    <label>Trabajos: </label>
                    @foreach ($jobs->job as $data_job)
                    <h1>{{$data_job}}, </h1>
                    @endforeach

                    @if($record->maintenance_type != "")
                    @if($record->maintenance_type != "A")
                        <br>
                        <label>Proximo Mantenimiento: </label>
                        @if($record->type == "MOTOCICLETA")
                        <h1 style="color:red">{{$record->mileage+3000}} Km.</h1>
                        @else
                        <h1 style="color:red">{{$record->mileage+4000}} Km.</h1>
                        @endif
                    @endif
                    @endif
                </td>
                
                
                
            </tr>
        </tbody>  
        
    
      
        

            @php
                $cont=$cont+1;
            @endphp    
        @endforeach
       
             
</table>


</body>

</html>
