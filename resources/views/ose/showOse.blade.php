@extends('layouts.layoutSecondary')

@section('content')
<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<main>
        <center><h1>LISTADO DE ORDENES DE SERVICIO EXTERNO</h1><br></center>
        

</main>
<a class= "buttonA" href="{{ url('/ot/showOT') }}">
   Ir a Listado de OT's
</a>
<br><br>
<div class="row-fluid" style="margin-top: 0">
    
    <div class="span12">
        
        <div class="widget-box">
            <div class="widget-content">
                <table id="myTable" class="display nowrap cell-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>OSE</th>
                            <th>OT</th>
                            <th>Cia</th>
                            <th>Placa</th>
                            <th>Taller Externo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($operators as $record)
                        <tr>
                            <td><center>{{ $record->id }}</center></td>
                            <td><center><center>{{ $record->ot_id }}</td>
                            <td><center>{{ $record->cia }}<center></td>
                            <td><center>{{ $record->plate }}</center></td>
                            <td>{{ $record->workshop }}</td>
                            <td><center>    
                             <!--   <a href="#" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                               <a href="#" class="btn1" title="Eliminar"  onclick="return confirm('¿Seguro que quiere eliminar el registro del vehículo?')"><i class="fa fa-trash"></i></a> -->
                                <a href="/showOse/osePDF/{{$record->id}}" target="_blank" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                            <!--   <a href="#" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                                <a href="#" class="btn1" title="Anular"  onclick="return confirm('¿Seguro que quiere anular La Orden de Trabajo?')"><i class="fa fa-font"></i></a> -->
                            </center></td>
                        </tr>
                    @endforeach                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>





@endsection

@section('js')
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
    <script src="{{ asset('js/oses.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    
@endsection



