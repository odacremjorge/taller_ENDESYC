@extends('layouts.layoutMain')

@section('content')

<center><h1>Crear Nuevo Historial a la CIA N° {{$vehicle->cia}}</h1><br></center>
<section class="form-register">
<center><h4>Registro de Trabajos al Historial</h4></center>
        <form action="{{ route('record.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="vehicle_cia" value="{{$vehicle->cia}}">
        <div class="row">
                <div class="col-xl-6">
                    <label>Ingrese Orden de Trabajo (OT)</label>
                    <br><br>
                        <input class="controls @error('Ot_historial') is-invalid @enderror" type="text" name="Ot_historial" id="Ot_historial" placeholder="Ingrese la Orden de Trabajo *" maxlength="10" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('Ot_historial')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>    
                </div>
                

                <div class="col-xl-6"> 
                <label>Seleccione Tipo de Trabajo</label>
                <br><br>
                        <select class="controls"  name="Type" id="Type" placeholder="Ingrese el Tipo">
                                
                                <option value=""></option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="ABC">ABC</option>
                                <option value="ABCD">ABCD</option>
                                
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-6">
                    <label>Ingrese el Tipo de Lubricante</label>
                    <br><br>
                        <input class="controls" type="text" name="Lubricante" id="Lubricante" placeholder="Ingrese el tipo de lubricante" maxlength="30" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                     <br>    
                </div>

                <div class="col-xl-6"> 
                <label>Seleccione el/los Filtros Cambiados</label>
                <br><br>
                        <select class="controls"  name="Filtro" id="Filtro" placeholder="Ingrese el Filtro">
                                
                                <option value=""></option>
                                <option value="Filtro de Aceite">Filtro de Aceite</option>
                                <option value="Filtro de Combustible">Filtro de Combustible</option>
                                <option value="Filtro de Aire">Filtro de Aire</option>
                                <option value="Filtros Aceite/Combustible">Filtros Aceite/Combustible</option>
                                <option value="Filtros Aceite/Aire">Filtros Aceite/Aire</option>
                                <option value="Filtros Combustible/Aire">Filtros Combustible/Aire</option>
                                <option value="Filtros Aceite/Combustible/Aire">Filtros Aceite/Combustible/Aire</option>
                                
                        </select>  
                        
                         <br> 
                </div>
                
        </div>
         <center>      
         <input class="botons" type="submit" value="Guardar Datos al Historial">
        </center>

        </form>
</section>

@endsection