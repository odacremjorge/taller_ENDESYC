@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Crear Nuevo Vehículo</h1><br></center>
<section class="form-register">
<center><h4>Registro de Vehículo</h4></center>
        <form action="{{ route('vehicle.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="col-xl-3">
                        <input class="controls @error('Cia') is-invalid @enderror" type="text" name="Cia" id="Cia" placeholder="Ingrese la Cia *" maxlength="10" onKeypress="if ((event.keyCode > 0 && event.keyCode < 48)||(event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Cia')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>    
                </div>
                <div class="col-xl-3">
                        <input class="controls @error('Company') is-invalid @enderror" type="text" name="Company" id="Company" placeholder="Ingrese la Empresa *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Company')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        
                        <br>
                </div> 
                
                <div class="col-xl-3">  
                        <input class="controls @error('Plate') is-invalid @enderror" type="text" name="Plate" id="Plate" placeholder="Ingrese la Placa *" maxlength="10" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Plate')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                </div>

                <div class="col-xl-3"> 
                        <select class="controls"  name="Type" id="Type" placeholder="Ingrese el Tipo">
                                
                                <option value="CAMIONETA">CAMIONETA</option>
                                <option value="MOTOCICLETA">MOTOCICLETA</option>
                                <option value="FURGON">FURGON</option>
                                <option value="CAMION">CAMION</option>
                                <option value="VAGONETA">VAGONETA</option>
                                <option value="MAESTRANZA">MAESTRANZA</option>
                                <option value="CAMION BALDE">CAMION BALDE</option>
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Mark" id="Mark" placeholder="Ingrese la Marca " maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        <br>  
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Model" id="Model" placeholder="Ingrese el Modelo" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                         <br>      
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Year" id="Year" placeholder="Ingrese el Año" maxlength="4" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        <br>    
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Color" id="Color" placeholder="Ingrese el Color" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                                
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Displacement" id="Displacement" placeholder="Ingrese la Cilindrada" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)|| (event.keyCode > 57 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        <br>            
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Motor_type" id="Motor_type" placeholder="Ingrese el Tipo de Motor" maxlength="50" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        <br>    
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Serie" id="Serie" placeholder="Ingrese la Serie del Motor">
                                
                </div>
                <div class="col-xl-3">  
                        <input class="controls" type="text" name="Chassis" id="Chassis" placeholder="Ingrese el Numero de Chasis">
                        <br>            
                </div>
                
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>

@endsection
