@extends('layouts.layoutOSE')

@section('content')

        <center><h1>Crear Nueva Orden de Servicio Externo</h1><br></center>
<section class="form-register">
<center><h4>Registro de OSE para la Orden de trabajo N° {{$ot->id}}</h4></center>
        <form action="{{ route('ose.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="Ot_id" value="{{$ot->id}}">
        <div class="row">

                <div class="col-xl-12">

                    <label>Datos de la Orden de Servicio Externo</label>

                </div>
                
                <div class="col-xl-6">
                        <input class="controls @error('Empresa') is-invalid @enderror" type="text" name="Empresa" id="Empresa" placeholder="Ingrese empresa para realizar los trabajos *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Empresa')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>    
                </div>
                <div class="col-xl-6">
                        <input class="controls" type="text" name="Precio" id="Precio" placeholder="Ingrese el precio del servicio" maxlength="10" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        <br>    
                </div>

                

                <div class="col-xl-12">

                    <label>Agregue los trabajos externos a solicitar</label>

                </div>
                <div class="col-xl-12">
                    <div class="optionBox">
                      

                        <div class="block">
                            <input class="jobs" type="text" name="data[]" placeholder="Ingrese trabajo a solicitar" /> <span class="remove">X</span>
                        </div>
                     
                     <center>
                        <div class="block">
                            <span class="add">Agregar trabajo</span><br>
                        </div>
                      </center>
                </div>
                </div>   

                @php
            date_default_timezone_set('America/Caracas');
            session_start();
            $_SESSION['variable']=date('m-d-Y h:i:s a', time());

        @endphp    

        </div>  
        <br><br>
         <center>      
         <input class="buttonB" type="submit" value="Generar OSE">
        </center>

        </form>
</section>

@endsection

@section('js')
<script>
        $('.add').click(function() {
            $('.block:last').before('<div class="block"><input class="jobs" type="text"  name="data[]" placeholder="Ingrese trabajo a solicitar" /><span class="remove">X</span></div>');
        });
        $('.optionBox').on('click','.remove',function() {
            $(this).parent().remove();
        });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection