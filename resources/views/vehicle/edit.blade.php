@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Actualizar Vehículo con Cia {{$vehicle->cia}}</h1><br></center>
<section class="form-register">

        <form action="{{ route('vehicle.update', $vehicle->id)}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xl-3">
                        <label>Compañia</label> 
                        <br>
                        <input class="controls" type="text" value= "{{$vehicle->cia}}" name="Cia" id="Cia" placeholder="Ingrese la Cia">
                        <br>    
                </div>
                <div class="col-xl-3">
                        <label>Empresa</label> 
                        <br>
                        <input class="controls" type="text" value= "{{$vehicle->company}}" name="Company" id="Company" placeholder="Ingrese la Empresa">
                         <br>
                </div> 
                <div class="col-xl-3">  
                        <label>Placa</label> 
                        <br>
                        <input class="controls" type="text" value= "{{$vehicle->plate}}" name="Plate" id="Plate" placeholder="Ingrese la Placa">
                        <br>
                </div>

                <div class="col-xl-3"> 
                        <label>Tipo</label> 
                        <br>
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
                        <label>Marca</label> 
                        <input class="controls" type="text" value= "{{$vehicle->mark}}" name="Mark" id="Mark" placeholder="Ingrese la Marca">
                        <br>  
                </div>
                <div class="col-xl-3">  
                        <label>Modelo</label> 
                        <input class="controls" type="text" value= "{{$vehicle->model}}" name="Model" id="Model" placeholder="Ingrese el Modelo">
                         <br>      
                </div>
                <div class="col-xl-3"> 
                        <label>Año</label>  
                        <input class="controls" type="text" value= "{{$vehicle->year}}" name="Year" id="Year" placeholder="Ingrese el Año">
                        <br>    
                </div>
                <div class="col-xl-3"> 
                        <label>Color</label>  
                        <input class="controls" type="text" value= "{{$vehicle->color}}" name="Color" id="Color" placeholder="Ingrese el Color">
                                
                </div>
                <div class="col-xl-3"> 
                        <label>Cilindrada</label>  
                        <input class="controls" type="text" value= "{{$vehicle->displacement}}" name="Displacement" id="Displacement" placeholder="Ingrese la Cilindrada">
                        <br>            
                </div>
                <div class="col-xl-3">  
                        <label>Tipo de Motor</label> 
                        <input class="controls" type="text" value= "{{$vehicle->motor_type}}" name="Motor_type" id="Motor_type" placeholder="Ingrese el Tipo de Motor">
                        <br>    
                </div>
                <div class="col-xl-3"> 
                        <label>Serie</label>  
                        <input class="controls" type="text" value= "{{$vehicle->serie}}" name="Serie" id="Serie" placeholder="Ingrese la Serie del Motor">
                                
                </div>
                <div class="col-xl-3">  
                        <label>Chasis</label> 
                        <input class="controls" type="text" value= "{{$vehicle->chassis}}" name="Chassis" id="Chassis" placeholder="Ingrese el Numero de Chasis">
                        <br>            
                </div>
                
        </div>  
         <center>      
         <input class="botons" type="submit" value="Actualizar Datos">
        </center>

        </form>
</section>

@endsection