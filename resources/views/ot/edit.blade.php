@extends('layouts.layoutEditOt')

@section('content')

<div class="container">
<main>
        
    <section class="form-register">
        <center><h1>ORDEN DE TRABAJO N° {{$ot->id}}</h1><br></center>
        <a class= "botons-2" href="{{ url('/ot/showOT') }}">
            Ir a Listado de OT's
        </a>
        <br><br><br>
            <div class="row">

                    <!--<div class="col-xl-12">
                        <label name="Cilindrada">Agregar Repuestos</label>
                    </div>

                    <div class="col-xl-2">
                    <a href="{{ url('/replacement/create') }}">
                        <button class="botons-2" type="button">
                            + Repuesto
                        </button>
                    </a>  
                    </div>-->



<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Registro de Nuevo Repuesto</h4></center>
        <form action="{{ route('replacement.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="ot_id" value="{{$ot->id}}">
                <div class="col-xl-4">
                        <input class="controls @error('CodigoRepuesto') is-invalid @enderror" type="text" name="CodigoRepuesto" id="CodigoRepuesto" placeholder="Ingrese el codigo del repuesto *" maxlength="10" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 256)) event.returnValue = false;">
                        @error('CodigoRepuesto')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>    
                </div>
               
                <div class="col-xl-4">
                        <input class="controls @error('DescripcionRepuesto') is-invalid @enderror" type="text" name="DescripcionRepuesto" id="DescripcionRepuesto" placeholder="Descripción del repuesto *" maxlength="100">
                        @error('DescripcionRepuesto')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>
                </div> 
                <div class="col-xl-4">  
                        <input class="controls @error('Solicitante') is-invalid @enderror" type="text" name="Solicitante" id="Solicitante" placeholder="Operador solicitante *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Solicitante')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div>
                          <ul id="myResp">

                          </ul>
                        </div>
                        <br>
                </div>
                <div class="col-xl-3">
                        <input class="controls" type="text" name="NumRepuesto" id="NumRepuesto" placeholder="Numero del repuesto" maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                         <br>
                </div> 
                <div class="col-xl-3">  
                        <input class="controls @error('CantidadRepuesto') is-invalid @enderror" type="text" name="CantidadRepuesto" id="CantidadRepuesto" placeholder="Ingrese la cantidad *" maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('CantidadRepuesto')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br> 
                </div>

                <div class="col-xl-3">  
                        <input class="controls @error('UnidadRepuesto') is-invalid @enderror" type="text" name="UnidadRepuesto" id="UnidadRepuesto" placeholder="Unidad * Ejm. (pza, ltr, etc.)" maxlength="30" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('UnidadRepuesto')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>  
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="PrecioRepuesto" id="PrecioRepuesto" placeholder="Ingrese el precio en Bs." maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                         <br>      
                </div>
                                                    
                    <input class="buttonB" type="submit" value="Guardar Datos">
                    
                
        </div>

        </form>
</section>


                    <div class="col-xl-12">
                    <center> <label name="Cilindrada">Lista de Repuestos</label> </center>
                    </div>
                    <div class="col-xl-12">
                        <div class="container">
                            <div class="row-fluid" style="margin-top: 0">
                                <div class="span12">
                                    <div class="widget-box">
                                        <div class="widget-content">
                                            <table id="myTable" class="display nowrap cell-border" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Descripcion</th>
                                                        <th>No de Pieza</th>
                                                        <th>Solicitante</th>
                                                        <th>Cantidad</th>
                                                        <th>Unidad</th>
                                                       <!-- <th>Precio (Bs.)</th> -->
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                @foreach ($replacements as $record)
                                                    <tr>
                                                        <td style="font-size:12px">{{$record->codigo}}</td>
                                                        <td style="font-size:12px">{{$record->description}}</td> 
                                                        <td style="font-size:12px">{{$record->num_replacement}}</td>   
                                                        <td style="font-size:12px">{{$record->name_operator}}</td>
                                                        <td style="font-size:12px">{{$record->amount}}</td>  
                                                        <td style="font-size:12px">{{$record->unit}}</td>
                                                       <!-- <td style="font-size:12px">{{$record->price_replacement}}</td>-->
                                                        <td><center>

                                                    <!--<a href="#" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>-->
                                                   
                                                    @if ( Auth::user()->role == 'ADMINISTRADOR')                                                        
                                                    <form
                                                            action="{{ route('replacement.destroy', $record->id) }}"
                                                            method="POST">
                                                            <a href="/replacement/{{$record->id}}/edit" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                                                   
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                    onclick="return confirm('¿Seguro que quiere eliminar el registro del repuesto?')"
                                                                    title="Clic para eliminar" data-toggle="tooltip"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </form>
                                                   @endif

                                                <!--    <a href="#" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                                                    <a href="#" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                                                    <a href="#" class="btn3" title="Anular"  onclick="return confirm('¿Seguro que quiere anular La Orden de Trabajo?')"><i class="fa fa-font"></i></a> -->
                                                    </center></td></tr>
                                                 @endforeach            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
            </div>
</section>
        

</main>



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
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<!-- estilos de la tabla -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">


<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>


<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
@endsection

@section('myscripts')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/replacement.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    
@endsection





