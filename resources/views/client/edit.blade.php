@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Actualizar datos del cliente</h1><br></center>
<section class="form-register">
<center><h4>Registro de Cliente</h4></center>
        <form action="{{ route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xl-6">
                        <input class="controls" type="text" value="{{$client->name_client}}" name="Name_client" id="Name_client" placeholder="Ingrese nombre del cliente">
                        <br>    
                </div>
                <div class="col-xl-6">
                        <input class="controls" type="text" value="{{$client->nit}}" name="Nit" id="Nit" placeholder="Ingrese el NIT o CI del cliente">
                         <br>
                </div> 
               
                
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>

@endsection