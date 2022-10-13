@extends('layouts.layoutSecondary')

@section('content')

<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
    <center><h1>LISTA DE OPERADORES</h1></center>
    <br>
    <a class="fcc-btn"  href="{{ url('/operator/listPDF') }}" target="_blank" >
        Descargar PDF 
     </a> 
     &nbsp;
     <a class="fcc-btn"  href="{{ url('/operator/create') }}" >
        Crear Operador
     </a> 
     <br><br>
    
    <div >
                <table id="myTable" class="display nowrap cell-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo de Operador</th>
                            <th>Telefono</th>
                            <th>Codigo</th>
                            <th>C.I.</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                   
                    <tbody>

                    @foreach ($operators as $record)
                        <tr>
                        <td><center>{{ $record->id }}</center></td>
                        <td>{{ $record->name_operator }}</td>
                        <td><center>{{ $record->type_operator }}</center></td>
                        <td><center>{{ $record->phone }}<center></td>
                        <td><center>{{ $record->code_operator }}</center></td>
                        <td><center>{{ $record->ci }}</center></td>
                        
                        <td><center>
                        @if ( Auth::user()->role == 'ADMINISTRADOR')
                        <form
                            action="{{ route('operator.destroy', $record->id) }}"
                            method="POST">
                            <a href="/operator/{{$record->id}}/edit" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                                                   
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn1"
                                onclick="return confirm('¿Seguro que quiere eliminar el registro del operador?')"
                                title="Clic para eliminar" data-toggle="tooltip"><i
                                class="fa fa-trash"></i></button>
                        </form>
                        @endif
                         </center></td>
                        </tr>
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



<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
@endsection

@section('myscripts')
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/operators.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    
@endsection