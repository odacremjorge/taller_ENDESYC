@extends('layouts.layoutOT')

@section('content')

        <center><h1>Finalizar Orden de Trabajo</h1><br></center>
<section class="form-register">
<center><h4>Orden de trabajo N° {{$ot->id}}</h4></center>
        <form action="{{ route('ot.finish', $ot->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">

                <div class="col-xl-12">

                    <label>Datos para la finalización de la Orden de Trabajo (ingrese fecha y hora bajo el formato adecuado como el ejemplo) (aaaa-mm-dd hh:mm:ss)</label>

                </div>
                
                <div class="col-xl-12">
                        <input class="controls @error('FechaFinal') is-invalid @enderror" type="text" name="FechaFinal" id="FechaFInal" placeholder="Ingrese la fecha y hora de finalización FORMATO FECHA ( aaaa-mm-dd ) HORA (hh:mm:ss)" maxlength="20" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 45)||(event.keyCode > 45 && event.keyCode < 48)||(event.keyCode > 58 && event.keyCode < 256)) event.returnValue = false;">
                        @error('FechaFinal')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>    
                </div>
                <!--<div class="col-xl-6">
                        <input class="controls" type="text" name="HoraFinal" id="HoraFinal" placeholder="Ingrese la hora de finalización FORMATO ( hh:mm:ss am )">
                        <br>    
                </div>-->
                <div class="col-xl-12">
                        <input class="controls" type="text" name="Finalizacion" id="Finalizacion" placeholder="Ingrese si existe alguna observacion adicional">
                        <br>    
                </div>
        </div> 

        <br><br>
         <center>      
         <input class="buttonB" type="submit" value="Finalizar OT">
        </center>

        </form>
</section>