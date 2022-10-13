@extends('layouts.layoutSecondary')

@section('content')


<section class="form-register">
<center><h4>Asignación de Vehículo</h4></center>

        <form action="{{ route('assign.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

                <div class="col-xl-12">

                        <label>Datos del Conductor</label>

                </div>

                <div class="col-xl-9">
                        
                        <input class="controls @error('Codigo') is-invalid @enderror" type="text" name="Codigo" id="Codigo" placeholder="Ingrese codigo del conductor designado *" maxlength="4" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('Codigo')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div>
                          <ul id="myResp">

                          </ul>
                        </div>
                        <br>    
                </div>

                <div class="col-xl-3">
                <a href="{{ url('/operator/create') }}">
                        <button class="botons-2" type="button">
                            + Crear conductor
                        </button>
                    </a> 
                </div>
                <div class="col-xl-4">
                        <input class="controls" type="text" name="Nombre" id="Nombre" placeholder="Nombre completo del conductor">
                         <br>
                </div> 
               
                <div class="col-xl-4">
                        <input class="controls" type="text" name="CI" id="CI" placeholder="Carnet de identidad del conductor">
                        <br>    
                </div>
                <div class="col-xl-4">
                        <input class="controls" type="text" name="Celular" id="Celular" placeholder="Numero de Celular del conductor">
                         <br>
                </div> 
                
                <div class="col-xl-12">

                        <label>Datos del Vehículo</label>

                </div>
                
                <div class="col-xl-4">
                
                        <input class="controls @error('Seccion') is-invalid @enderror" type="text" name="Seccion" id="Seccion" placeholder="Sección asignada - (Centro de Costos) *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 40)||(event.keyCode > 41 && event.keyCode < 45)||(event.keyCode > 45 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Seccion')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>
                </div> 
                
                <div class="col-xl-5">
                        <input class="controls @error('Cia') is-invalid @enderror" type="text" name="Cia" id="Cia" placeholder="Ingrese la Cia *" maxlength="10" onKeypress="if ((event.keyCode > 0 && event.keyCode < 48)||(event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Cia')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div>
                          <ul id="myResp1">

                          </ul>
                        </div>
                        <br>    
                </div>
                <div class="col-xl-3">
                <a href="{{ url('/vehicle/create') }}">
                        <button class="botons-2" type="button">
                            + Crear vehículo
                        </button>
                    </a>  
                </div>
                
                <div class="col-xl-4">  
                        <input class="controls" type="text" name="Placa" id="Placa" placeholder="Ingrese la Placa">
                        <br>
                </div>

                <div class="col-xl-4">  
                        <input class="controls" type="text" name="Tipo" id="Tipo" placeholder="Ingrese el Tipo">
                         <br> 
                </div>

                <div class="col-xl-4">  
                        <input class="controls" type="text" name="Marca" id="Marca" placeholder="Ingrese la Marca">
                        <br>  
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Modelo" id="Modelo" placeholder="Ingrese el Modelo">
                         <br>      
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Anio" id="Anio" placeholder="Ingrese el Año">
                        <br>    
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Color" id="Color" placeholder="Ingrese el Color">
                                
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Cilindrada" id="Cilindrada" placeholder="Ingrese la Cilindrada">
                        <br>            
                </div>
                <!--
                <div class="col-xl-12">

                        <label >Responsable del Vehículo</label>

                </div>
               
                
                <div class="col-xl-6">
                        <input class="controls" type="text" name="Responsable" id="Responsable" placeholder="Ingrese al responsable del vehículo">
                       
                       
                        <br>    
                </div>
                <div class="col-xl-6">
                        <input class="controls" type="text" name="CelularResponsable" id="CelularResponsable" placeholder="Ingrese celular">
                        <br>    
                </div>
                <div class="col-xl-3">
                <a href="{{ url('/operator/create') }}">
                        <button class="botons-2" type="button">
                            + Agregar Responsable
                        </button>
                    </a>  
                </div>-->
                
                <div class="col-xl-12"> 
                        
                        <label name="EstadoVehiculo">Observaciones de estado del vehículo</label>
                        <br> <br>
                        <input class="controls-2" type="text" name="EstadoVehiculo" id="EstadoVehiculo" placeholder="">
                        <br>            
                </div>

                <div class="col-xl-12"> 
                <label name="Inventario">Inventario de Recepción</label>         
                </div>
                <div class="col-xl-2">
                                            
                                              
                                            <div class="panel-body">

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="1">     Gata c/palanca</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="2">     Llave de ruedas</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="3">     Llanta de auxilio</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="4">     Espejos</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="5">     Sobrepisos</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="6">     Estuche</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="7">     Extintor</label>
                                                  </div>

                                              
                                            </div>
                                          </div>

                                          <div class="col-xl-2">
                                            <div class="panel-body">

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="8">     Modulo de radio</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="9">     Botiquín</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="10">    Triángulo</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="11">    Bateria</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="12">    Control Alarma</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="13">    Llave de contacto</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="14">    Limpia parabrisas</label>
                                                  </div>

                                              
                                            </div>
                                          </div>

                                          <div class="col-xl-2">
                                            <div class="panel-body">

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="15">    Cantoneras</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="16">    Antena</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="17">    Encendedor</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="18">    Tapa tanque</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="19">    Tapa cubos</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="20">    Roseta inspección</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="21">    Roseta SOAT</label>
                                                  </div>

                                              
                                            </div>
                                          </div>

                                          <div class="col-xl-2">
                                            <div class="panel-body">

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="22">    3ra Placa</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="23">    B-Sisa</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="24">    Faroles</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="25">    Stops</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="26">    Guiñadores</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="27">    Vidrios</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="28">    Emblemas</label>
                                                  </div>

                                              
                                            </div>
                                          </div>

                                          <div class="col-xl-2">
                                            <div class="panel-body">

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="29">    Radio CD</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="30">    Micrófono</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="31">    Control Remoto</label>
                                                  </div>
                                                  

                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="32">    Placas</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="33">    Conos</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="34">    Aut. Restricción</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input name="inv[]" type="checkbox" value="35">    Escalera</label>
                                                  </div>

                                              
                                            </div>
                                          </div>

                                           
                                          
                                      </div><!--fin Inventario-->

                
                                        
                                       

                                        
                                        
                                   



                
        </div> 
        
        @php
            date_default_timezone_set('America/Caracas');
            session_start();
            $_SESSION['variable']=date('m-d-Y h:i:s a', time());

        @endphp 

         <center>      
         <input class="botons" type="submit" name="AssignVehicle" value="Asignar Vehiculo">
        </center>

        </form>
</section>
@endsection
@section('js')

  <script>
    $(document).ready(function(){
        $('#Codigo').keyup(function(){
            $('.mylist').remove();
            var search = $('#Codigo').val();
            $.ajax({
              type: 'POST',
              url: '/autocomplete',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search':search
              },
              success: function(data){
                //alert('todo bien');

                var opts = $.parseJSON(data);
                  $.each(opts, function(i,d){
                    $('.mylist').remove();
                  $('#myResp').append('<li class="mylist" onclick="fillData('+d.id+')">'+d.code_operator+' '+d.name_operator+'</li>');
                  
                });
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });

        // autocompletado de vehiculo
        $('#Cia').keyup(function(){
            $('.mylist1').remove();
            var search1 = $('#Cia').val();
            $.ajax({
              type: 'POST',
              url: '/autocomplete_vehicle',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search1':search1
              },
              success: function(data){
                //alert('todo bien');
                var opts1 = $.parseJSON(data);
                  $.each(opts1, function(i,d){
                    $('.mylist1').remove();
                  $('#myResp1').append('<li class="mylist1" onclick="fillDataVehicle('+d.id+')">'+d.cia+' '+d.plate+'</li>');
                  
                });
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });

         

       

    });
    function fillData(id){
      $.ajax({
              type: 'GET',
              url: '/getdata',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                if (json.message_error == 'ok')
                {
                  alert('No se puede asignar, por que el operador ya tiene designado un vehículo');
                }
                else
                {
                $('#Codigo').val(json.code_operator);
                $('#Nombre').val(json.name_operator);
                $('#CI').val(json.ci);
                $('#Celular').val(json.phone);
                $('.mylist').remove();
                }
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

    function fillDataVehicle(id){
      $.ajax({
              type: 'GET',
              url: '/getdata_vehicleAssign',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                if (json.message_error == 'ok')
                {
                  alert('No se puede asignar, El vehículo ya se encuentra asignado.');
                }
                else
                {
                $('#Cia').val(json.cia);
                $('#Placa').val(json.plate);
                $('#Tipo').val(json.type);
                $('#Marca').val(json.mark);
                $('#Modelo').val(json.model);
                $('#Anio').val(json.year);
                $('#Color').val(json.color);
                $('#Cilindrada').val(json.displacement);
                $('.mylist1').remove();
                }
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

   
    
  </script>

  <script type="text/javascript">
    window.onload=function() {
    document.getElementById('Nombre').disabled=true;  
    document.getElementById('CI').disabled=true;
    document.getElementById('Celular').disabled=true;

//Celdas de vehiculo bloqueadas
    document.getElementById('Placa').disabled=true;  
    document.getElementById('Tipo').disabled=true;
    document.getElementById('Marca').disabled=true;
    document.getElementById('Modelo').disabled=true;  
    document.getElementById('Anio').disabled=true;
    document.getElementById('Color').disabled=true;
    document.getElementById('Cilindrada').disabled=true;

//Celdas de responsable bloqueadas
//document.getElementById('CelularResponsable').disabled=true;
  } 
  </script> 


@endsection