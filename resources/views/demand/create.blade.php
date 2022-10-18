@extends('layouts.layoutSecondary')

@section('content')

<div class="container">
<main>
        
    <section class="form-register">
        <center><h1>SOLICITUD PARA LA CIA {{$vehicle->cia}} | {{$vehicle->plate}}</h1><br></center>
       
        
            <div class="row">

<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

        <form action="{{ route('demand.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                <div class="col-xl-4">
                    <label>Conductor:</label><br><br>
                    <select class="controls"  name="Conductor" id="Conductor" placeholder="Ingrese el Conductor">
                         @foreach ($operators as $data)  
                         @if ($data->type_operator == 'Conductor')     
                        <option value="{{$data->name_operator}}">{{$data->name_operator}}</option>
                        @endif
                        @endforeach
                        
                </select>  
                               <br>    
                </div>

                <div class="col-xl-4">
                    <label>Kilometraje:</label><br><br>
                        <input class="controls" type="number" name="Kilometraje" id="Kilometraje" placeholder="Ingrese el Kilometraje *">
                         <br>    
                </div>

                <div class="col-xl-4">
                    <label>Fecha de la Solicitud:</label><br><br>
                        <input class="controls" type="date" name="Fecha" id="Fecha" placeholder="Ingrese la Fecha *">
                         <br>    
                </div>

                <div class="col-xl-4">
                    <label>Sección:</label><br><br>
                        <input class="controls" type="text" name="Seccion" id="Seccion" placeholder="Ingrese la Sección *">
                         <br>    
                </div>

                <div class="col-xl-4">
                    <label>Centro de Costos:</label><br><br>
                        <input class="controls" type="number" name="Centro" id="Centro" placeholder="Ingrese el Centro de Costos *">
                         <br>    
                </div>

                <div class="col-xl-4">
                    <label>Fecha de Aprobación:</label><br><br>
                        <input class="controls" type="date" name="FechaAprobacion" id="FechaAprobacion" placeholder="Ingrese la Fecha de Aprobación">
                         <br>    
                </div>

                <div class="col-xl-12">

                    <label name="Cilindrada">Trabajos Solicitados</label>

            </div>
            <div class="col-xl-12">
                <div class="optionBox">
                  

                    <div class="block">
                        <input class="jobs" type="text" name="data[]" placeholder="Ingrese trabajo a solicitar" /> <span class="remove">X</span>
                    <br>
                    </div>
                 
                 <center>
                    <div class="block">
                        <span class="add">Agregar trabajo</span><br>
                    </div><br>
                  </center>
                </div>
                
                </div>   
                
               
               
                                                    
                    <input class="buttonB" type="submit" value="Guardar Datos">
                    
                
        </div>

        </form>
</section>

</section>

</main>

<br><br>
<center> <h3>Lista de Solicitudes</h3> </center>
<table id="myTable" class="display nowrap cell-border" style="width:100%">
    <thead>
        <tr>
            <th>Solicitud N°</th>
            <th>Conductor</th>
            <th>Kilometraje</th>
            <th>Fecha</th>
            <th>Centro de Costos</th>
            <th>Sección</th>
            <th>Acción</th>
        </tr>
    </thead>
  


        <tbody>
            @foreach ($demands as $data)
            <tr>
                <td style="color:black">{{$data->id}}</td>
                <td style="color:black">{{$data->driver_demand}}</td> 
                <td style="color:black">{{$data->mileage_demand}}</td>   
                <td style="color:black">{{$data->date_demand}}</td>
                <td style="color:black">{{$data->ccDemand}}</td>  
                <td style="color:black">{{$data->section_demand}}</td>
            <td><center>

            <!--<a href="#" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>-->
        
                                                            
            <form
                    action="{{ route('demand.destroy', $data->id) }}"
                    method="POST">
                    <a href="/demand/demandPDF/{{$data->id}}" target="_blank" class="btn" title="Imprimir solicitud"><i class="fa fa-print" ></i></a>
        
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn1"
                            onclick="return confirm('¿Seguro que quiere eliminar el registro de la solicitud?')"
                            title="Clic para eliminar" data-toggle="tooltip"><i
                            class="fa fa-trash"></i></button>
            </form>
        

            </center></td></tr>
            @endforeach   
            </tbody>
  
</table>

@endsection

@section('js')

<script>
    $('.add').click(function() {
        $('.block:last').before('<div class="block"><input class="jobs" type="text"  name="data[]" placeholder="Ingrese trabajo a solicitar" /><span class="remove">X</span></div>');
    });
    $('.optionBox').on('click','.remove',function() {
        $(this).parent().remove();
    });
</script>




<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<!-- estilos de la tabla -->



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

    <script src="{{ asset('js/demanda.js') }}" defer></script>
   
    
@endsection





