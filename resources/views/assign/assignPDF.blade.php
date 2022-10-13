<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Taller Endesyc Oruro' }}</title>
    <link rel="shortcut icon" href="{{public_path('images/taller1.png')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/assignPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
        
    <img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <table class="foto2">
    
       
                            
                <td><h4><center> CIA N° {{$vehicle->cia}}</center></h4></td>
                                
                            
                  
    </table>
    <br><br>
    <center><h3>ASIGNACION DE VEHICULO</h3></center>
   
    <center><h5>Unidad de Mantenimiento y Reparación de Vehículos y Equipos</h5></center>
   
    <br><br>

    @php
    
        
        $inv=json_decode($assign->inventory_assign);
        

       
    @endphp

    <h5>Datos del conductor designado:</h5> 
    
            <div class="caja">
                <h5>NOMBRE: <a>{{ $operator->name_operator }}</a></h5>
                <h5>CODIGO: <a>{{ $operator->code_operator }}</a></h5>
                <h5>CELULAR: <a>{{ $operator->phone }}</a></h5>
                <h5>C.I.: <a>{{ $operator->ci }}</a></h5>
            </div>
            
            <div class="caja">
                <center><h5>SECCION</h5></center>
                <h5> Sección Asignada: <a>{{$assign->section_assign}}</a></h5>
                <h5> Gestión: <a><?php echo date('Y'); ?></a></h5>
                <h5> Fecha de Asignación: <a>{{$assign->DateAssign}}</a></h5>
                
            </div>
    
    <br><br><br>
  <!--  {{$assign->section_assign}}
    {{$assign->inventory_assign}}
    {{$operator->name_operator}}-->
 
<h5>Datos del Vehículo:</h5> 
<center>
<div class="caja3">
    <h5>Cia: <a style="font-size:12px">{{$vehicle->cia}}</a></h5>
</div>
<div class="caja3">
    <h5>Placa: <a style="font-size:12px">{{$vehicle->plate}}</a></h5>
</div>
<div class="caja3">
    <h5>Empresa: <a style="font-size:12px">{{$vehicle->company}}</a></h5>
</div>
<div class="caja3">
    <h5>Tipo: <a style="font-size:12px">{{$vehicle->type}}</a></h5>
</div>
<br><br>
<div class="caja3">
    <h5>Marca: <a style="font-size:12px">{{$vehicle->mark}}</a></h5>
</div>
<div class="caja3">
    <h5>Modelo: <a style="font-size:12px">{{$vehicle->model}}</a></h5>
</div>
<div class="caja3">
    <h5>Año: <a style="font-size:12px">{{$vehicle->year}}</a></h5>
</div>
<div class="caja3">
    <h5>Color: <a style="font-size:12px">{{$vehicle->color}}</a></h5>
</div>
<br><br>
<div class="caja3">
    <h5>Cilindrada: <a style="font-size:12px">{{$vehicle->displacement}}</a></h5>
</div>
<div class="caja3">
    <h5>Motor a: <a style="font-size:12px">{{$vehicle->motor_type}}</a></h5>
</div>
<div class="caja3">
    <h5>Serie: <a style="font-size:12px">{{$vehicle->serie}}</a></h5>
</div>
<div class="caja3">
    <h5>Chasis: <a style="font-size:11px">{{$vehicle->chassis}}</a></h5>
</div>
</center>
<br><br>
<h5>Inventario del Vehículo:</h5>
   
<div class="caja1">   
        @foreach($inv->inventory as $data) 
        @if ($data == "1")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="1" checked="true">     Gata c/palanca</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "1")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="1">     Gata c/palanca</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "2")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="2" checked="true">     Llave de ruedas</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "2")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="2">     Llave de ruedas</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "3")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="3" checked="true">     Llanta de auxilio</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "3")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="3">     Llanta de auxilio</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "4")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="4" checked="true">     Espejos</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "4")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="4">     Espejos</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "5")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="5" checked="true">     Sobrepisos</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "5")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="5">     Sobrepisos</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "6")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="6" checked="true">    Estuche</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "6")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="6">    Estuche</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "7")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="7" checked="true">    Extintor</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "7")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="7">    Extintor</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "8")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="8" checked="true">    Modulo de radio</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "8")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="8">    Modulo de radio</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "9")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="9" checked="true">    Botiquin</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "9")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="9">    Botiquin</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "10")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="10" checked="true">    Triangulo</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "10")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="10">    Triangulo</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "11")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="11" checked="true">    Bateria</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "11")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="11">    Bateria</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "12")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="12" checked="true">    Control de alarma</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "12")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="12">    Control de alarma</label>
            </div>
        @endif
</div>

<div class="caja1">

        @foreach($inv->inventory as $data) 
        @if ($data == "13")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="13" checked="true">     Llave de contacto</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "13")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="13">     Llave de contacto</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "14")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="14" checked="true">     Limpia parabrisas</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "14")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="14">     Limpia parabrisas</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "15")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="15" checked="true">     Cantoneras</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "15")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="15">     Cantoneras</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "16")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="16" checked="true">     Antena</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "16")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="16">     Antena</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "17")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="17" checked="true">     Encendedor</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "17")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="17">     Encendedor</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "18")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="18" checked="true">     Tapa tanque</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "18")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="18">     Tapa tanque</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "19")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="19" checked="true">     Tapa Cubos</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "19")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="19">     Tapa Cubos</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "20")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="20" checked="true">     Roseta I.V.</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "20")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="20">     Roseta I.V.</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "21")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="21" checked="true">     Roseta SOAT</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "21")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="21">     Roseta SOAT</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "22")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="22" checked="true">     3ra placa</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "22")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="22">     3ra placa</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "23")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="23" checked="true">     B-sisa</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "23")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="23">     B-sisa</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "24")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="24" checked="true">     Faroles</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "24")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="24">     Faroles</label>
            </div>
        @endif

    
</div>
<div class="caja1">
        
        @foreach($inv->inventory as $data) 
        @if ($data == "25")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="25" checked="true">     Stops</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "25")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="25">     Stops</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "26")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="26" checked="true">     Guiñadores</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "26")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="26">     Guiñadores</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "27")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="27" checked="true">     Vidrios</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "27")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="27">     Vidrios</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "28")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="28" checked="true">     Emblemas</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "28")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="28">     Emblemas</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "29")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="29" checked="true">     Radio CD</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "29")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="29">     Radio CD</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "30")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="30" checked="true">     Microfono</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "30")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="30">     Microfono</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "31")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="31" checked="true">     Control remoto</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "31")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="31">     Control remoto</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "32")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="32" checked="true">     Placas</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "32")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="32">     Placas</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "33")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="33" checked="true">     Conos</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "33")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="33">     Conos</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "34")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="34" checked="true">     Aut. restricc.</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "34")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="34">     Aut. restricc.</label>
            </div>
        @endif

        @foreach($inv->inventory as $data) 
        @if ($data == "35")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="35" checked="true">     Escalera</label>
            </div>
            @break
        @endif
        @endforeach   
        @if ($data <> "35")
            <div class="checkbox">
                <label><input name="inv[]" type="checkbox" value="35">     Escalera</label>
            </div>
        @endif
    
</div>
<h5>Estado del Vehículo:</h5>
<div class="caja2">
    <h5>OBSERVACIONES: <a>{{$assign->condition_vehicle}}</a></H5>
</div>
<br><br><br><br>

<div class="caja4">
    <h5>Observaciones adicionales:</h5>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    <a>..........................................................................................</a>
    
</div>
<center><a>Marque con una X las observaciones</a></center>
@if ($vehicle->type == "MOTOCICLETA")
<img class="foto3" src="{{public_path('images/moto3.jpg')}}" width="200" loading="lazy" >
@elseif ($vehicle->type == "FURGON")
<center><img class="foto3" src="{{public_path('images/furgon.jpg')}}" width="200" loading="lazy" ></center>
@else
<center><img class="foto3" src="{{public_path('images/camioneta.jpg')}}" width="200" loading="lazy" ></center>
@endif 
<br><br><br><br><br><br><br><br><br><br>
<div class="caja6">

</div>
<div class="caja5">
<br><br>
    <h5>Responsable: </h5>
</div>

<div class="caja5">
    <br><br>
    <center><h5>Conductor: <a>{{ $operator->name_operator }}</a></h5></center>
</div>
<div class="caja6">

</div>
<center><h5>Firmas de constancia para la asignacion de la compañia: {{$vehicle->cia}} </h5></center>
</body>




</html>
