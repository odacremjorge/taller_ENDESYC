<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'OT No ' }} {{$ots->id}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/otPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
        
    <img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
    
       
                            
            <h4><center> OT N° {{$ots->id}}</center></h4>
                                
                            
                  
    </div>
    <br><br>
    <center><h5>ORDEN DE TRABAJO</h5></center>
    <center><a style="font-size:12px">Unidad de Mantenimiento y Reparación de Vehículos y Equipos</a></center>
    <br>
    @php
        $inv=json_decode($ots->inventory);
        $jobs=json_decode($ots->job);
        $cont=1; 
    @endphp
        
    <div class="cajaOT">
        <center><h5>Datos del conductor designado:</h5></center>
        <h5>Nombre: <a>{{ $operator->name_operator }}</a></h5>
        <h5>Celular: <a>{{ $operator->phone }}</a></h5>
        <h5>C.I.: <a>{{ $operator->ci }}</a></h5>
        <center><h5>Datos de entrada del vehículo:</h5></center>
        <h5>Kilometraje: <a>{{ $ots->mileage }} Km.</a></h5>
        <h5>Combustible: <a>{{ $ots->fuel }} %</a></h5>
    </div>
    <div class="cajaOT">
                <center><h5>Detalle Orden de Trabajo</h5></center>
                <h5> Cliente: <a>{{$ots->name_client}}</a></h5>
                <h5> NIT: <a>{{$ots->nit}}</a></h5>
                <h5> Fecha: <a>{{$ots->Date}}</a></h5>
                <h5> Sección: <a>{{$ots->section}}</a></h5>
                <h5> Centro de Costos: <a>{{$ots->cost_center}}</a></h5>
                <h5> Encargado: <a>{{$ots->manager}}</a></h5>
    </div>

    
    <h5>Datos del Vehículo:</h5> 

<div class="caja2">
    <h5>Cia: <a>{{$vehicle->cia}}</a></h5>
    <h5>Placa: <a>{{$vehicle->plate}}</a></h5>
    <h5>Empresa: <a>{{$vehicle->company}}</a></h5>
    <h5>Tipo: <a>{{$vehicle->type}}</a></h5>
    <h5>Marca: <a>{{$vehicle->mark}}</a></h5>
    <h5>Modelo: <a>{{$vehicle->model}}</a></h5>
</div>

<div class="caja2">
    <h5>Año: <a>{{$vehicle->year}}</a></h5>
    <h5>Color: <a>{{$vehicle->color}}</a></h5>
    <h5>Cilindrada: <a>{{$vehicle->displacement}}</a></h5>
    <h5>Tipo de Motor: <a>{{$vehicle->motor_type}}</a></h5>
    <h5>Serie: <a>{{$vehicle->serie}}</a></h5>
    <h5>Chasis: <a>{{$vehicle->chassis}}</a></h5>
</div>


<center><h5>Inventario del Vehículo:</h5></center>
@if ($vehicle->cia <> "936")  
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

        
        
        

</div>
<div class="caja1"> 
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

        
</div>
<div class="caja1"> 
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

        

</div>
<div class="caja1"> 
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

        
</div>
<div class="caja1">
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
@endif
<h5>Trabajos Solicitados:</h5> 
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th style="width:70%">Descripción</th>
                <th>Mecánico</th>
                <th>V°B°</th>
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($jobs->job as $record)
            <tr>
                <td style="font-weight: bold">{{$cont}}</td>
                <td style="text-align: justify">{{$record}}</td>
                <td></td>
                <td></td>
            </tr>
            @php
            $cont=$cont+1;
            @endphp
        @endforeach
        @if ($cont < "20")
        @for ($i = $cont; $i <=20; $i++)
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
<div class="cajaIMG">
    <center><h5>Observaciones del Vehículo</h5></center>
    <center><label>Marca con una X la observación:</label></center>
   @if ($vehicle->type == "MOTOCICLETA")
    <img class="fotoMoto" src="{{public_path('images/moto1.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br><br><br><br>
    <img class="fotoMoto" src="{{public_path('images/moto2.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br><br><br>
   @elseif ($vehicle->type == "FURGON")
   
    <img class="fotoMoto" src="{{public_path('images/furgon1.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br><br><br><br>
    <img class="fotoMoto" src="{{public_path('images/furgon2.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br><br><br>
   @else
    <img class="foto3" src="{{public_path('images/camioneta1.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br>
    <img class="foto3" src="{{public_path('images/camioneta2.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br>
    <img class="foto3" src="{{public_path('images/camioneta3.jpg')}}" width="200" loading="lazy" ><br><br><br><br><br>
    @endif
    <div class="cajaEnd">
        <center><h5 style="color: rgb(223, 19, 19)">TERMINADO</h5></center>
        <h5 style="color: rgb(223, 19, 19)">Fecha:.................... Hora:..............</h5>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="caja4">
    <h5>OBSERVACIONES: <a>{{$ots->observation}}</a></H5>
</div>


<div class="caja5">
    <br><br>
<center><h3>ENDE SYC: <a>{{$ots->name}}</a></h3></center>
</div>
<div class="caja5">
<br><br>
<center><h3>Cliente: <a>{{$operator->name_operator }}</a></h3></center>
</div>


<div class="caja6">
    <br><br>
<h3>Cliente:</h3>
</div>
<div class="caja6">
    <br><br>
<h3>ENDE SYC:</h3>

</div>
<br><br><br><br>
<center>
<h1 style="float:left">aaaaaaaa</h1>
<h5 style="float:left">Firmas en conformidad de la recepción del vehículo.</h5>
<h1 style="float:left">aaaaaaaaaaaaaaaaaaaa</h1>
<h5 style="float:left">Firmas en conformidad de la entrega del vehículo.</h5>
</center>
</body>

</html>
