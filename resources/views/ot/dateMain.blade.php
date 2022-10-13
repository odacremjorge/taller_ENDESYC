@extends('layouts.layoutEditOt')

@section('content')

<div class="container">
<main>

    @php
        $jobs=json_decode($ots->job);
        $cont=1; 
    @endphp
    
    <section class="form-register">
        <center><h1 style="color:#00ff75">ORDEN DE TRABAJO N° {{$ot->id}} <a style="color:#eac102">( {{$ot->condition}} )</a></h1><br></center>
       
            <div class="row">

                    <div class="col-xl-12">
                        <center> <label name="Cilindrada">Datos Generales (Haga click en las tarjetas para ver la información)</label> </center>
                    </div>

                    
                    <div class="card">
                        <div class="card2">
                            <br>
                            <h5 style="color:#00ff75">DATOS DE LA OT</h5>
                            <br>
                            <h5 style="font-size:11px">EMPRESA: {{$ots->name_client}}</h5>
                            <br>
                            <h5 style="font-size:11px">NIT: {{$ots->nit}}</h5>
                            <br>
                            <h5 style="font-size:11px">FECHA: {{$ots->Date}}</h5>
                            <br>
                            <h5 style="font-size:11px">SECCION: {{$ots->section}}</h5>
                            <br>
                            <h5 style="font-size:11px">CENTRO DE COSTOS: {{$ots->cost_center}}</h5>
                            <br>
                            <h5 style="font-size:11px">ENCARGADO: {{$ots->manager}}</h5>
                            <br>
                            <h5 style="font-size:11px">CONDUCTOR: {{$ots->name_operator}}</h5>
                            <br>
                            <h5 style="font-size:11px">CELULAR: {{$ots->phone}}</h5>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card2">
                        <br>
                            <h5 style="color:#00ff75">DATOS DE LA CIA {{$vehicle->cia}}</h5>
                            <br>
                            <h5 style="font-size:11px">PLACA: {{$vehicle->plate}}</h5>
                            <br>
                            <h5 style="font-size:11px">EMPRESA: {{$vehicle->company}}</h5>
                            <br>
                            <h5 style="font-size:11px">TIPO: {{$vehicle->type}}</h5>
                            <br>
                            <h5 style="font-size:11px">MARCA: {{$vehicle->mark}}</h5>
                            <br>
                            <h5 style="font-size:11px">MODELO: {{$vehicle->model}}</h5>
                            <br>
                            <h5 style="font-size:11px">AÑO: {{$vehicle->year}}</h5>
                            <br>
                            <h5 style="font-size:11px">COLOR: {{$vehicle->color}}</h5>
                            <br>
                            <h5 style="font-size:11px">CILINDRADA: {{$vehicle->displacement}}</h5>
                            <br>
                            <h5 style="font-size:11px">MOTOR A: {{$vehicle->motor_type}}</h5>
                        </div>
                    </div>

                    <div class="card" >
                        <div class="card2">
                        <br>
                            <center><h5 style="color:#00ff75">REPUESTOS</h5></center>
                            <br>
                            
                                @foreach ($replacements as $record)
                                    @if ($cont < "10")
                                    <h5 style="font-size:11px">{{$record->amount}} {{$record->unit}} {{$record->description}} </h5>
                                    <br>
                                    @endif
                                    @php
                                        $cont=$cont+1;
                                    @endphp
                                @endforeach
                                
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card2">
                        <br>
                            <h5 style="color:#00ff75">ESTADO DE LA OT</h5>
                            <br>
                            <h5 style="font-size:11px">ESTADO: {{$ot->condition}}</h5>
                            @if ($ot->condition == "Anulado")
                            <br>
                                <h5 style="font-size:11px; text-align:justify">OBSERVACION: {{$ot->ObservationCancel}}</h5>
                            @endif

                            @if ($ot->condition == "Finalizado")
                                <br>
                                <h5 style="font-size:11px">FECHA DE FINALIZACION: {{$ot->DateFinish}}</h5>
                                <br>
                                <!--<h5 style="font-size:11px">HORA: {{$ot->TimeFinish}}</h5>
                                <br>-->
                                <h5 style="font-size:11px; text-align:justify">OBSERVACION: {{$ot->ObservationFinish}}</h5>

                            @endif
                            <br>
                            <h5 style="color:#00ff75">TRABAJOS DE LA OT</h5>
                            @foreach ($jobs->job as $record)
                            <br>
                                <h5 style="font-size:11px">{{$record}}</h5>

                            @endforeach
                        </div>
                    </div>
                   
            </div>
    </section>
        

</main>

</div>

@endsection