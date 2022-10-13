@extends('layouts.layoutMain')

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

        <center><h1>Vehículos</h1><br></center>
        
<div style="margin-left:100px;" class="container">
    <div class="row">

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-blue order-card">
          <div class="card-block">
            <a href="{{ url('/vehicle/list') }}">
              <h6 class="m-b-20">Ver Todos los Vehículos</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      @if ( Auth::user()->role == 'ADMINISTRADOR')
      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <a href="{{ url('/vehicle/create') }}">
              <h6 class="m-b-20">Agregar Vehículo</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-plus-circle f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
     
      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-yellow order-card">
          <div class="card-block">
            <a href="{{ route ('assign.create') }}">
              <h6 class="m-b-20">Asignar Vehículo</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-check-circle f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      @endif
    </div>

</div>

@endsection