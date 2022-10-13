@extends('layouts.layoutOT')

@section('content')

        <center><h1>Anular Orden de Trabajo</h1><br></center>
<section class="form-register">
<center><h4>Orden de trabajo N° {{$ot->id}}</h4></center>
        <form action="{{ route('ot.cancel', $ot->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">

                <div class="col-xl-12">

                    <label>Observación del motivo de anulación</label>

                </div>
                
                <div class="col-xl-12">
                        <input class="controls" type="text" name="Anulacion" id="Anulacion" placeholder="Ingrese el motivo de la nulación">
                        <br>    
                </div>
        </div>  
        <br><br>
         <center>      
         <input class="buttonB" type="submit" value="Anular OT">
        </center>

        </form>
</section>

@endsection

@section('js')

@endsection