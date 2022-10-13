@extends('layouts.layoutEditOt')

@section('content')

<center><h1>Actualizar Repuesto</h1><br></center>
<section class="form-register">
<center><h4>Registro de Repuesto</h4></center>
        <form action="{{ route('replacement.update', $replacement->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xl-4">
                        <input class="controls " type="text" name="CodigoRepuesto" id="CodigoRepuesto" placeholder="Ingrese el codigo del repuesto *" maxlength="10" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 256)) event.returnValue = false;">
                       <!-- @error('CodigoRepuesto')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->
                        <br>    
                </div>

                
                <div class="col-xl-4">
                        <input class="controls" type="text" name="DescripcionRepuesto" id="DescripcionRepuesto" placeholder="Descripción del repuesto">
                         <br>
                </div> 
                <div class="col-xl-4">  
                        <input class="controls" type="text" name="Solicitante" id="Solicitante" placeholder="Operador solicitante">
                        <div>
                          <ul id="myResp">

                          </ul>
                        </div>
                        <br>
                </div>
                <div class="col-xl-3">
                        <input class="controls" type="text" name="NumRepuesto" id="NumRepuesto" placeholder="Numero del repuesto">
                         <br>
                </div> 
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="CantidadRepuesto" id="CantidadRepuesto" placeholder="Ingrese la cantidad">
                         <br> 
                </div>

                <div class="col-xl-3">  
                        <input class="controls" type="text" name="UnidadRepuesto" id="UnidadRepuesto" placeholder="Ingrese la Unidad Ejm. (pza, ltr, etc.)">
                        <br>  
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="PrecioRepuesto" id="PrecioRepuesto" placeholder="Ingrese el precio en Bs.">
                         <br>      
                </div>
               
         
        </div>
        <center>      
         <input style="width:30%" class="botons" type="submit" value="Actualizar Datos">
        </center>
        </form>
</section>

@endsection

@section('js')

  <script>
    $(document).ready(function(){
        $('#Solicitante').keyup(function(){
            $('.mylist').remove();
            var search3 = $('#Solicitante').val();
            $.ajax({
              type: 'POST',
              url: '/autocompleteSolicitante',
              data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'search3':search3
              },
              success: function(data){
                //alert(data);
                var opts = $.parseJSON(data);
                  $.each(opts, function(i,d){
                  $('.mylist').remove();
                  $('#myResp').append('<li class="mylist" onclick="fillDataSolicitante('+d.id+')">'+d.name_operator+'</li>');
                  
                });
                //$('#myResp').remove();
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
        });
    }); 
    function fillDataSolicitante(id){
      $.ajax({
              type: 'GET',
              url: '/getdataSolicitante',
              data:'id='+id, 
              success: function(data){
                var json = $.parseJSON(data);
                $('#Solicitante').val(json.name_operator);
                $('.mylist').remove();
               
              },
              error: function(XMLHttpRequest){
                console.log(XMLHttpRequest);
              }
            });
    }
</script>
@endsection
