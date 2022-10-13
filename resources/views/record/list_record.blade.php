@extends('layouts.layoutSecondary')

@section('content')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container">

    <center><h1>PARQUE AUTOMOTRIZ DEL TALLER</h1></center>
        
    <div class="widget-content">
                <table id="myTable" class="table display nowrap table-striped table-bordered" style="width:100%">
                           

                <thead>
                        <tr>
                            
                            <th>Cia</th>
                            <th>Empresa</th>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                             <th>Año</th>
                            <th>Color</th>
                            <th>Cilindrada</th>
                            <th>Motor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                   
                    <tbody>

                    @foreach ($vehicles as $record)
                       
                        <td><center>{{ $record->cia }}<center></td>
                        <td><center>{{ $record->company }}</center></td>
                        <td><center>{{ $record->plate }}<center></td>
                        <td><center>{{ $record->type }}</center></td>
                        <td><center>{{ $record->mark }}<center></td>
                        <td><center>{{ $record->model }}</center></td>
                        <td><center>{{ $record->year }}<center></td>
                        <td><center>{{ $record->color }}</center></td>
                        <td><center>{{ $record->displacement }}<center></td>
                        <td><center>{{ $record->motor_type }}</center></td>
                        <td><center>
                           <a href="#" class="btn" title="Imprimir Historial"><i class="fa fa-print" ></i></a>
                         <!--   <a href="#" class="btn1" title="Eliminar"  onclick="return confirm('¿Seguro que quiere eliminar el registro del vehículo?')"><i class="fa fa-trash"></i></a>
                            <a href="#" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                            <a href="#" class="btn3" title="Anular"  onclick="return confirm('¿Seguro que quiere anular La Orden de Trabajo?')"><i class="fa fa-font"></i></a> -->

                           

                            </center></td></tr>
                    @endforeach                   
                    </tbody>
                    
                </table>
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
    <script src="{{ asset('js/app1.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    <script src="{{ asset('js/tableOperators.js') }}" defer></script>
    <script src="{{ asset('js/canvas.js') }}" defer></script>
@endsection

