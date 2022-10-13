@extends('layouts.layoutMain')

@section('content')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container">
<main>
        <center><h1>USUARIOS</h1><br></center>
        

</main>

<a class= "buttonA" href="{{ url('/users/create/')}}">
  Crear Usuario
</a>
<br><br><br>

<div >
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Accion</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                      
                   @foreach($users as $record)
                        <tr>
                        <td><center> {{$record->id}}</center></td>
                        <td><center>{{$record->name}}<center></td>
                        <td><center>{{$record->email}}<center></td>
                        <td><center>{{$record->role}}</center></td>
                       
                        
                        <td><center>
                        <form
                            action="{{ route('users.destroy', $record->id) }}"
                            method="POST">
                            <a href="/users/{{$record->id}}/edit" class="btn4" title="Editar"><i class="fa fa-edit"></i></a>
                     
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn1"
                              onclick="return confirm('¿Seguro que quiere eliminar al usuario?')"
                              title="Clic para eliminar" data-toggle="tooltip"><i
                              class="fa fa-trash"></i>
                            </button>
                        </form>
                            </center></td></tr>
                    @endforeach
                                     
                    </tbody>
                    
                </table>
            </div>


</div>





@endsection
