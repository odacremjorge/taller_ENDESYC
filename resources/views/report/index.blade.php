@extends('layouts.layoutMain')

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

        <center><h1>Informes</h1><br></center>
        
<div style="margin-left:100px;" class="container">
    <div class="row">

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <a href="{{ url('/report/Showday') }}">
              <h6 class="m-b-20">Informe Diario</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-file-pdf f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-yellow order-card">
          <div class="card-block">
            <a href="{{ url('/report/Showweek') }}">
              <h6 class="m-b-20">Informe Semanal</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-file-pdf f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-pink order-card">
          <div class="card-block">
            <a href="{{ url('/report/Showmonth') }}">
              <h6 class="m-b-20">Informe Mensual</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-file-pdf f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      

    </div>

</div>

@endsection