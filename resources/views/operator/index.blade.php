@extends('layouts.layoutMain')

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

        <center><h1>Operadores & Clientes</h1><br></center>
        
<div style="margin-left:100px;" class="container">
    <div class="row">

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <a href="{{ url('/operator/list') }}">
              <h6 class="m-b-20">Ver Operadores</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-yellow order-card">
          <div class="card-block">
            <a href="{{ url('/operator/create') }}">
              <h6 class="m-b-20">Crear Operador</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-plus-circle f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      @if ( Auth::user()->role == 'ADMINISTRADOR')
      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-pink order-card">
          <div class="card-block">
            <a href="{{ url('/operator/client') }}">
              <h6 class="m-b-20">Clientes</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-user f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      @endif
      

    </div>

</div>

@endsection