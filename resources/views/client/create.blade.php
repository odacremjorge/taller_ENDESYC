@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Crear Nuevo Cliente</h1><br></center>
        
<section class="form-register">
<center><h4>Registro de Cliente</h4></center>
        <form action="{{ route('client.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="col-xl-6">
                        <input class="controls @error('Name_client') is-invalid @enderror" type="text" name="Name_client" id="Name_client" placeholder="Ingrese nombre del cliente *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 164)||(event.keyCode > 165 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Name_client')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>    
                </div>
                <div class="col-xl-6">
                        <input class="controls @error('Nit') is-invalid @enderror" type="text" name="Nit" id="Nit" placeholder="Ingrese el NIT o CI del cliente *" maxlength="10" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('Nit')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>
                </div> 
               
                
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>

@endsection