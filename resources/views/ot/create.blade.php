@extends('layouts.layoutOT')

@section('content')
     

<section class="form-register">
<center><h4>Crear Nueva Orden de Trabajo</h4></center>
        <form action="{{ route('ot.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

                <div class="col-xl-12">

                        <label>Datos de la Orden de Trabajo</label>

                </div>

                <div class="col-xl-4">
                        <input class="controls @error('Cliente') is-invalid @enderror" type="text" name="Cliente" id="Cliente" placeholder="Ingrese el Cliente *">
                        @error('Cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        <div>
                          <ul id="myResp">

                          </ul>
                        </div>
                        <br>    
                </div>
                <div class="col-xl-4">
                        <input class="controls @error('CentroCostos') is-invalid @enderror" type="text" name="CentroCostos" id="CentroCostos" placeholder="Ingrese Centro de Costos *" maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('CentroCostos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror 
                        <br>
                </div> 

                <div class="col-xl-4">
                        <input class="controls @error('Kilometraje') is-invalid @enderror" type="text" name="Kilometraje" id="Kilometraje" placeholder="Ingrese el kilometraje de entrada *" maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('Kilometraje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror 
                        <br>    
                </div>
                <div class="col-xl-4">
                        <input class="controls @error('Combustible') is-invalid @enderror" type="text" name="Combustible" id="Combustible" placeholder="Ingrese el % de Combustible de entrada *" maxlength="3" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                          @error('Combustible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror 
                        <br>
                </div> 
                <div class="col-xl-4">  
                        <input class="controls @error('Conductor') is-invalid @enderror" type="text" name="Conductor" id="Conductor" placeholder="Ingrese Conductor *">
                          @error('Conductor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        <div>
                          <ul id="myResp2">

                          </ul>
                        </div>
                        <br>
                </div>
                <div class="col-xl-4">  
                        <input class="controls @error('Encargado') is-invalid @enderror" type="text" name="Encargado" id="Encargado" placeholder="Ingrese al Encargado del Vehículo *">
                        @error('Encargado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        <div>
                          <ul id="myResp3">

                          </ul>
                        </div>
                        <br>
                </div>
                
                <div class="col-xl-12">

                        <label name="Cilindrada">Datos del Vehículo</label>

                </div>
                
                <div class="col-xl-4">
                
                        <input class="controls" type="text" name="Seccion" id="Seccion" placeholder="Ingrese la Sección" maxlength="50" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                         <br>
                </div> 

                <div class="col-xl-6">
                        <input class="controls @error('Cia') is-invalid @enderror" type="text" name="Cia" id="Cia" placeholder="Ingrese la Cia *" maxlength="5">
                          @error('Cia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        <div>
                          <ul id="myResp1">

                          </ul>
                        </div>
                        
                        <br>    
                </div>
                <div class="col-xl-2">
                <!--<input class="botons-2 " type="button" value="+ Crear Vehiculo" onclick="{{ url('/vehiculo/create') }}" >  -->
                    <a href="{{ url('/vehicle/create') }}">
                        <button class="botons-2" type="button">
                            + Crear Vehiculo
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
                <div class="col-xl-12">

                        <label name="Cilindrada">Trabajos Solicitados</label>

                </div>
                <div class="col-xl-12">
                    <div class="optionBox">
                      

                        <div class="block">
                            <input class="jobs" type="text" name="data[]" placeholder="Ingrese trabajo a solicitar" /> <span class="remove">X</span>
                        </div>
                     
                     <center>
                        <div class="block">
                            <span class="add">Agregar trabajo</span><br>
                        </div>
                      </center>
                    </div>
                    </div>   

                <br><br>
                <div class="col-xl-12"> 
                        
                        <label name="Cilindrada">Observaciones</label>
                        <br> <br>
                        <input class="controls-2" type="text" name="Obvs" id="Obvs" placeholder="">
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

                                        
                                        
                                   



        @php
            date_default_timezone_set('America/Caracas');
            session_start();
            $_SESSION['variable']=date('m-d-Y h:i:s a', time());

        @endphp                                 
                
        </div>  
         <center>      
         <input class="buttonB" type="submit" value="Generar OT">
        </center>

        </form>
</section>
@endsection

@section('js')

  <script>
    $(document).ready(function(){
        $('#Cliente').on("keypress", function(){
          var search = $('#Cliente').val();
         /* var regex = /^[a-zA-Z ]+$/;
          if (regex.test(search) == false)
          {
            return false;
          }*/
         if((event.which > 0 && event.which < 32) ||(event.which > 32 && event.which < 65) || (event.which > 90 && event.which < 97) || (event.which > 122 && event.which < 256) || $(this).val().length == 100){
            return false;
          }
            $('.mylist').remove();
            
            $.ajax({
              type: 'POST',
              url: '/autocomplete_client',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search':search
              },
              success: function(data){
                //alert(data);
                var opts = $.parseJSON(data);
                  $.each(opts, function(i,d){
                  $('.mylist').remove();
                  $('#myResp').append('<li class="mylist" onclick="fillData('+d.id+')">'+d.name_client+'</li>');
                  
                });
                //$('#myResp').remove();
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });

        $('#Conductor').on("keypress", function(){
          var search2 = $('#Conductor').val(); 
          if((event.which > 0 && event.which < 32) ||(event.which > 32 && event.which < 65) || (event.which > 90 && event.which < 97) || (event.which > 122 && event.which < 256) || $(this).val().length == 100){
            return false;
          }
          $('.mylist2').remove();
            
            $.ajax({
              type: 'POST',
              url: '/autocompleteDriver',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search2':search2
              },
              success: function(data){
                //alert(data);
                var opts2 = $.parseJSON(data);
                  $.each(opts2, function(i,d){
                  $('.mylist2').remove();
                  $('#myResp2').append('<li class="mylist2" onclick="fillDataDriver('+d.id+')">'+d.name_operator+'</li>');
                  
                });
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });

        $('#Encargado').on("keypress", function(){
          var search2 = $('#Encargado').val();  
          if((event.which > 0 && event.which < 32) ||(event.which > 32 && event.which < 65) || (event.which > 90 && event.which < 97) || (event.which > 122 && event.which < 256) || $(this).val().length == 100){
            return false;
          }
          $('.mylist2').remove();
            
            $.ajax({
              type: 'POST',
              url: '/autocompleteDriver',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search2':search2
              },
              success: function(data){
                //alert(data);
                var opts2 = $.parseJSON(data);
                  $.each(opts2, function(i,d){
                  $('.mylist2').remove();
                  $('#myResp3').append('<li class="mylist2" onclick="fillDataResponsible('+d.id+')">'+d.name_operator+'</li>');
                  
                });
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });

        // autocompletado de vehiculo
        $('#Cia').on("keypress", function(){
          var search1 = $('#Cia').val();
          if((event.which > 0 && event.which < 32) ||(event.which > 32 && event.which < 48) || (event.which > 57 && event.which < 65) ||  (event.which > 90 && event.which < 97) || (event.which > 122 && event.which < 256) || $(this).val().length == 100){
            return false;
          }
           
          $('.mylist1').remove();
            
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
              url: '/getdata_client',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                $('#Cliente').val(json.name_client);
                $('.mylist').remove();
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

    function fillDataDriver(id){
      $.ajax({
              type: 'GET',
              url: '/getdataDriver',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                $('#Conductor').val(json.name_operator);
                $('.mylist2').remove();
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

    function fillDataResponsible(id){
      $.ajax({
              type: 'GET',
              url: '/getdataDriver',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                $('#Encargado').val(json.name_operator);
                $('.mylist2').remove();
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

    function fillDataVehicle(id){
      $.ajax({
              type: 'GET',
              url: '/getdata_vehicle',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                
                $('#Cia').val(json.cia);
                $('#Placa').val(json.plate);
                $('#Tipo').val(json.type);
                $('#Marca').val(json.mark);
                $('#Modelo').val(json.model);
                $('#Anio').val(json.year);
                $('#Color').val(json.color);
                $('#Cilindrada').val(json.displacement);
                $('.mylist1').remove();
                
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }

       
    
  </script>
  
  

  <script type="text/javascript">
    window.onload=function() {
    

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

<script>
        $('.add').click(function() {
            $('.block:last').before('<div class="block"><input class="jobs" type="text"  name="data[]" placeholder="Ingrese trabajo a solicitar" /><span class="remove">X</span></div>');
        });
        $('.optionBox').on('click','.remove',function() {
            $(this).parent().remove();
        });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="{{ asset('js/app2.js') }}" defer></script>

@endsection