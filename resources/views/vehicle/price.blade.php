@extends('layouts.layoutSecondary')

@section('content')

        
<section class="form-register">
<center><h4>Cotizaciones</h4></center>
        <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">

                    <div class="col-xl-12">
                        <label name="Cilindrada">Generar Nueva Cotización</label>
                    </div>

                    <div class="col-xl-2">
                        <input class="botons-2" type="submit" value="+ Crear Cotizacion">  
                    </div>

                    <div class="col-xl-12">
                    <center> <label name="Cilindrada">Lista de Cotizaciones</label> </center>
                    </div>
                    <div class="col-xl-12">
                        <div class="container">
                            <div class="row-fluid" style="margin-top: 0">
                                <div class="span12">
                                    <div class="widget-box">
                                        <div class="widget-content">
                                            <table id="myTable" class="table display nowrap table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>OT</th>
                                                        <th>Cia</th>
                                                        <th>Empresa</th>
                                                        <th>Placa</th>
                                                        <th>Estado</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                    <tr><td>12500</td><td>182</td><td><center>ENDESYC</center></td><td>471-CRK</td><td><center>Finalizado</center></td><td><center>
                                                        
                                                        <a href="#" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                                                    <!--   <a href="#" class="btn1" title="Eliminar"  onclick="return confirm('¿Seguro que quiere eliminar el registro del vehículo?')"><i class="fa fa-trash"></i></a> -->
                                                        <a href="#" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                                                    <!--   <a href="#" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                                                        <a href="#" class="btn1" title="Anular"  onclick="return confirm('¿Seguro que quiere anular La Orden de Trabajo?')"><i class="fa fa-font"></i></a> -->
                                                    </center></td></tr>
                                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
            </div>

        </form>
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
    <script src="{{ asset('js/app1.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    <script src="{{ asset('js/tableOperators.js') }}" defer></script>
    <script src="{{ asset('js/canvas.js') }}" defer></script>
@endsection



