@extends('layouts.layoutMain')

@section('content')


<div class="container">
<main>
        <center><h1>VEHICULOS ASIGNADOS DEL TALLER DE ORURO</h1><br></center>
        

</main>

<a class= "buttonA" href="{{ url('/home/listAssignPDF/')}}" target="_blank">
  Descargar Listado
</a>
<br><br><br>

<div >
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cia</th>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Seccion (C Costos)</th>
                            <th>Accion</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                      
                    @foreach ($operators as $record)
                        <tr>
                        <td><center>{{ $record->cia }}</center></td>
                        <td><center>{{ $record->plate }}<center></td>
                        <td><center>{{ $record->type }}<center></td>
                        <td><center>{{ $record->code_operator }}</center></td>
                        <td>{{ $record->name_operator }}</td>
                        <td><center>{{ $record->phone }}</center></td>
                        <td><center>{{ $record->section_assign }}</center></td>
                        
                        
                        <td><center>
                        <form
                            action="{{ route('assign.destroy', $record->id) }}"
                            method="POST">
                            <a href="/home/assignPDF/{{$record->id}}" target="_blank" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                            @if ( Auth::user()->role == 'ADMINISTRADOR')
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn1"
                              onclick="return confirm('¿Seguro que quiere eliminar el registro de  asignación?')"
                              title="Clic para eliminar" data-toggle="tooltip"><i
                              class="fa fa-trash"></i></button>
                            @endif
                        </form>
                            <!--<a href="#" class="btn1" title="Eliminar"  onclick="return confirm('¿Seguro que quiere eliminar el registro del vehículo?')"><i class="fa fa-trash"></i></a>
                            <a href="/home/assignPDF/{{$record->id}}" target="_blank" class="btn4" title="Imprimir"><i class="fa fa-print"></i></a>
                            
                            <a href="#" class="btn2" title="Finalizar"><i class="fa fa-clipboard-check"></i></a>
                            <a href="#" class="btn3" title="Anular"  onclick="return confirm('¿Seguro que quiere anular La Orden de Trabajo?')"><i class="fa fa-font"></i></a> -->
                            </center></td></tr>
                    @endforeach                   
                    </tbody>
                    
                </table>
            </div>


</div>
@php
        $cont_finalizados=0; 
        $cont_abiertos=0;
        $cont_anulados=0;
        $total=0;
@endphp
@foreach ($ots_status as $data)
    @php
        $total=$total+1;
    @endphp
    @if ( $data->condition == 'Finalizado')
        @php
        $cont_finalizados=$cont_finalizados+1;
        @endphp
    @endif

    @if ( $data->condition == 'Abierto')
        @php
        $cont_abiertos=$cont_abiertos+1;
        @endphp
    @endif

    @if ( $data->condition == 'Anulado')
        @php
        $cont_anulados=$cont_anulados+1;
        @endphp
    @endif
    
@endforeach

@php
$porc_final=round(($cont_finalizados*100)/$total, 2);
$porc_abierto=round(($cont_abiertos*100)/$total, 2);
$porc_anulado=round(($cont_anulados*100)/$total, 2);
@endphp

<div class="board">
        <div class="titulo_grafica">
            <h3 class="t_grafica">Estadisticas de las Ordenes de Trabajo</h3>
            
        </div>
        <div class="sub_board">
            <div class="sep_board"></div>
            <div class="cont_board">
                <div class="graf_board">
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$porc_final}}%">
                            <div class="tag_g">{{$porc_final}}%</div>
                            <div class="tag_leyenda">Finalizados</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$porc_abierto}}%">
                            <div class="tag_g">{{$porc_abierto}}%</div>
                            <div class="tag_leyenda">Abiertos</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$porc_anulado}}%">
                            <div class="tag_g">{{$porc_anulado}}%</div>
                            <div class="tag_leyenda">Anulados</div>
                        </div>
                    </div>
                    
                </div>
                <div class="tag_board">
                    <div class="sub_tag_board">
                        <div>100</div>
                        <div>90</div>
                        <div>80</div>
                        <div>70</div>
                        <div>60</div>
                        <div>50</div>
                        <div>40</div>
                        <div>30</div>
                        <div>20</div>
                        <div>10</div>
                    </div>
                </div>
           </div> 
            <div class="sep_board"></div>
       </div>    
    </div>



@endsection

@section('js')


@endsection
