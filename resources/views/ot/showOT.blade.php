@extends('layouts.layoutSecondary')

@section('content')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container">
<main>
        <center><h1>LISTADO DE ORDENES DE TRABAJO</h1><br></center>
        

</main>

<a class= "buttonA" href="{{ url('/ot/create') }}">
  Nueva OT
</a>
<br><br>

<div class="row-fluid" style="margin-top: 0">
    
    <div class="span12">
        
        <div class="widget-box">
           <center> <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Taller Mecanico Regional Oruro</h5></div> </center>
            <div class="widget-content">
                <table id="myTable" class="display nowrap cell-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>OT</th>
                            <th>Cliente</th>
                            <th>Cia</th>
                            <th>Placa</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($operators as $record)
                        <tr>
                        <td><center>{{ $record->id }}</center></td>
                        <td><center>{{ $record->name_client }}<center></td>
                        <td><center>{{ $record->cia }}<center></td>
                        <td><center>{{ $record->plate }}</center></td>
                        <td>{{ $record->condition }}</td>
                        
                                                
                        <td><center>
                            
                            <a href="/showOT/dateMain/{{$record->id}}" class="btn1" title="Detalles Generales" ><i class="fa fa-edit"></i></a>
                            <a href="/showOT/otPDF/{{$record->id}}" target="_blank" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                         @if ($record->condition != 'Anulado')  
                            @if ($record->condition != 'Finalizado')   
                                <a href="/ose/createOse/{{$record->id}}" class="btn3" title="Crear OSE"><i class="fa fa-car"></i></a>
                                @if ( Auth::user()->role == 'ADMINISTRADOR')
                                <a href="/showOT/show_finish/{{$record->id}}" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                                <a href="/showOT/show_cancel/{{$record->id}}" class="btn5" title="Anular" onclick="return confirm('¿Seguro que quiere anular la OT?')"><i class="fa fa-font"></i></a>
                                @endif
                            @endif 
                                <a href="{{ route('ot.edit',$record->id)}}" class="btn" title="Agregar Repuestos"><i class="fa fa-tools" ></i></a>
                                
                         @endif   
                                                         
                            </center></td></tr>
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
    <script src="{{ asset('js/ots.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    <!-- <script src="{{ asset('js/tableOperators.js') }}" defer></script>
    <script src="{{ asset('js/canvas.js') }}" defer></script>-->
   
@endsection




