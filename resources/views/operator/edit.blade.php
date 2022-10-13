@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Actualizar Datos de Operador</h1><br></center>
<section class="form-register">
<center><h4>Registro de Operador</h4></center>
        <form action="{{ route('operator.update', $operator->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xl-6">

                </div>
                <div class="col-xl-6">

                    <label>Elija tipo de Operador</label>

                </div>
                <div class="col-xl-6">
                        <input class="controls" type="text" value="{{$operator->name_operator}}" name="Name_operator" id="Name_operator" placeholder="Ingrese el nombre del operador">
                        <br>    
                </div>
                                
                <div class="col-xl-6">  
                    <select class="controls"   name="Type_operator" id="Type_operator" placeholder="Ingrese la Empresa">
                        
                        <option value="Mecanico">Mecanico</option>
                        <option value="Conductor">Conductor</option>
                        <option value="Responsable">Responsable</option>
                    </select> 
                </div>
                
                <div class="col-xl-4">  
                        <input class="controls" type="text" value="{{$operator->phone}}" name="Phone" id="Phone" placeholder="Ingrese el telefono">
                        <br>
                </div>
                <div class="col-xl-4">
                        <input class="controls" type="text" value="{{$operator->code_operator}}" name="Code_operator" id="Code_operator" placeholder="Ingrese codigo del operador">
                         <br>
                </div> 
                <div class="col-xl-4">
                        <input class="controls" type="text" value="{{$operator->ci}}" name="Ci" id="Ci" placeholder="Ingrese cedula de identidad del operador">
                         <br>
                </div>

                
                

               
        </div>  
         <center>      
         <input class="botons" type="submit" value="Actualizar Datos">
        </center>

        </form>
</section>

@endsection