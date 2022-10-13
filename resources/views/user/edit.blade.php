@extends('layouts.appEdit')

@section('content')
<center> 
<section class="form-register">
<center><h4>Actualizar Datos de Usuario</h4></center>
                    <form method="POST" action="{{ route('users.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        
                           

                            <div class="col-xl-12">
                                <input id="name" type="text" class="controls @error('name') is-invalid @enderror bg-transparent text-white" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

                            <div class="col-xl-12">
                                <input id="email" type="email" class="controls @error('email') is-invalid @enderror bg-transparent text-white" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

                            <div class="col-xl-12">
                                
                            <select class="controls bg-transparent text-info"  name="role" id="role" placeholder="Ingrese el Tipo">
                                
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="USUARIO">USUARIO</option>
                                
                            </select>  
                            </div>
                        


                       
                            <div class="col-xl-12">
                                <input id="password" type="password" class="controls @error('password') is-invalid @enderror bg-transparent text-white" name="password" required autocomplete="new-password" placeholder="Ingresar Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                       
                            <div class="col-xl-12">
                                <input id="password-confirm" type="password" class="controls bg-transparent text-white" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                            </div>
                        

                            <center>      
                            <input class="botons" type="submit" value="Actualizar">
                            </center>
                    </form>
</section>              
</center>
@endsection
