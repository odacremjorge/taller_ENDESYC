@extends('layouts.layoutSecondary')

@section('content')

        <center><h1>Crear Nuevo Operador</h1><br></center>
<section class="form-register">
<center><h4>Registro de Operador</h4></center>
        <form action="{{ route('operator.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="col-xl-6">

                </div>
                <div class="col-xl-6">

                    <label>Elija tipo de Operador</label>

                </div>
                <div class="col-xl-6">
                        <input class="controls @error('Name_operator') is-invalid @enderror" type="text" name="Name_operator" id="Name_operator" placeholder="Ingrese el nombre del operador *" maxlength="100" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 65)||(event.keyCode > 90 && event.keyCode < 97) ||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                        @error('Name_operator')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>    
                </div>
                                
                <div class="col-xl-6">  
                    <select class="controls"  name="Type_operator" id="Type_operator" placeholder="Ingrese la Empresa">
                        
                        <option value="Mecanico">Mecanico</option>
                        <option value="Conductor">Conductor</option>
                        <option value="Responsable">Responsable</option>
                    </select> 
                </div>
                <div class="col-xl-4">
                        <input class="controls @error('Code_operator') is-invalid @enderror" type="text" name="Code_operator" id="Code_operator" placeholder="Ingrese codigo del operador *" maxlength="4" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        @error('Code_operator')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>
                </div> 
                <div class="col-xl-4">  
                        <input class="controls" type="text" name="Phone" id="Phone" placeholder="Ingrese el telefono" maxlength="10" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                        <br>
                </div>
                
                <div class="col-xl-4">
                        <input class="controls" type="text" name="Ci" id="Ci" placeholder="Ingrese cedula de identidad del operador" maxlength="12" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 48)||(event.keyCode > 57 && event.keyCode < 65) ||(event.keyCode > 90 && event.keyCode < 97)||(event.keyCode > 122 && event.keyCode < 256)) event.returnValue = false;">
                         <br>
                </div>

                
                

               
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>

@endsection