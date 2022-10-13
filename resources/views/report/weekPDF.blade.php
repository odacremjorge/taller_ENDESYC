<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Informe Semanal' }} </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/reportPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>

@php
        $cont=1; 
        
        
@endphp
        
<img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
    
       
                            
            <h4 style="font-size: 18px"><center> {{$date_report_init}} al {{$date_report_end}}</center></h4>
                                
                            
                  
    </div>
    <br><br>
    <center><h5>INFORME DE TRABAJOS</h5></center>
    <center><a style="font-size:12px">Unidad de Mantenimiento y Reparación de Vehículos y Equipos</a></center>
    <center><h5>INFORME SEMANAL</h5></center>
    <br>
    
    @if ($condition_report == "Todos")
    <h5>Informe de Trabajos Talleres Regional Oruro desde el {{$date_report_init}} al {{$date_report_end}}:</h5> 
    @else
    <h5>Informe de Trabajos Talleres Regional Oruro desde el {{$date_report_init}} al {{$date_report_end}}, estado({{$condition_report}}):</h5> 
    @endif

    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>OT</th>
                <th>CIA</th>
                <th>PLACA</th>
                <th>CLIENTE</th>
                <th>FECHA RECEPCION</th>
                <th>FECHA FINALIZACION</th>
                <th>DETALLE</th>
                <th>TIPO</th>
                <!--<th>REPUESTOS</th>-->
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($ot_rep_week as $data)
        @php
            $jobs=json_decode($data->job);
                 
        @endphp
        <tr>
                <td style="font-weight:bolder">{{$cont}}</td>
                <td > {{$data->id}}</td>
                <td > {{$data->cia}}</td>
                <td > {{$data->plate}}</td>
                <td > {{$data->name_client}}</td>
                <td > {{$data->Date}}</td>
                <td > {{$data->DateFinish}} {{$data->TimeFinish}}</td>
                <td style="text-align:left">
                    @foreach ($jobs->job as $data_job)
                     <h1>{{$data_job}}, </h1>
                    @endforeach
                </td>
                <td > {{$data->type}}</td>
        </tr>
        </tbody>  
            @php
                $cont=$cont+1;
            @endphp    
        @endforeach
       
             
</table>

@if ($condition_report == "Todos")
   <table style="width:50%">
       <thead>
           <tr>
                <th>TIPO</th>
                <th>INGRESADOS</th>
                <th>ENTREGADOS</th>
                <th>NO ENTREGADOS</th>
           </tr>
       </thead>
       <tbody>
            @php
                $total_ing=0;
                $total_ent=0;
            @endphp   
           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "CAMIONETA")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>CAMIONETA</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "MOTOCICLETA")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>MOTOCICLETA</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "FURGON")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>FURGON</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "CAMION")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>CAMION</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "VAGONETA")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>VAGONETA</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "MAESTRANZA")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>MAESTRANZA</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
            @php
                $cont_ing=0;
                $cont_ent=0;
            @endphp  
            @foreach ($ot_rep_week as $data)
                     @if ($data->type == "CAMION BALDE")
                        @php
                            $total_ing=$total_ing+1;
                            $cont_ing=$cont_ing+1;
                        @endphp   
                        @if ($data->condition == "Finalizado")
                            @php
                                $cont_ent=$cont_ent+1;
                                $total_ent=$total_ent+1;
                            @endphp 
                        @endif  
                     @endif
            @endforeach
            @php
                $no_ent=$cont_ing-$cont_ent;
            @endphp
               <td>CAMION BALDE</td>
               <td>{{$cont_ing}}</td>
               <td>{{$cont_ent}}</td>
               <td>{{$no_ent}}</td>
           </tr>

           <tr>
           @php
                $total_no_ent=$total_ing-$total_ent;
            @endphp
               <td style="font-weight:bolder">TOTAL</td>
               <td style="font-weight:bolder">{{$total_ing}}</td>
               <td style="font-weight:bolder">{{$total_ent}}</td>
               <td style="font-weight:bolder">{{$total_no_ent}}</td>
           </tr>
       </tbody>
   </table>
@endif
</body>

</html>