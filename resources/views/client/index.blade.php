@extends('layouts.layoutSecondary')

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

        
<section class="form-register">
<center><h4>Clientes</h4></center>
        
            <div class="row">

                    <div class="col-xl-12">
                        <label name="Cilindrada">Nuevo Cliente</label>
                    </div>

                    <div class="col-xl-2">
                    <a href="{{ url('/client/create') }}">
                        <button class="botons-2" type="button">
                            + Crear Cliente
                        </button>
                    </a>  
                    </div>

                    <div class="col-xl-12">
                    <center> <label name="Cilindrada">Lista de Clientes</label> </center>
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
                                                        <th>ID</th>
                                                        <th>Nombre del Cliente</th>
                                                        <th>NIT/CI</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                @foreach ($clients as $record)
                                                    <tr><td style="color:#000"><center>{{ $record->id }}</center></td>
                                                    <td style="color:#000">{{ $record->name_client }}</td>  
                                                    <td style="color:#000"><center>{{ $record->nit }}<center></td>
                                                    <td><center>

                                                    <!--<a href="#" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>-->
                                                   
                                                                                                            
                                                    <form
                                                            action="{{ route('client.destroy', $record->id) }}"
                                                            method="POST">
                                                            <a href="/client/{{$record->id}}/edit" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                                                   
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                    onclick="return confirm('¿Seguro que quiere eliminar el registro del cliente?')"
                                                                    title="Clic para eliminar" data-toggle="tooltip"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </form>
                                                   

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
    <script src="{{ asset('js/client.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    
@endsection



