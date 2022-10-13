@extends('layouts.layoutMain')

@section('content')


        <center><h1>Ordenes de servicio</h1><br>
<div style="margin-left:100px;" class="container">
        
        <div class="row">  
       
        <div class="col-md-4 col-xl-4">
        <div class="card bg-c-blue order-card">
          <div class="card-block">
            <a href="{{ url('/ot/showOT') }}">
              <h6 class="m-b-20">Ver OT's</h6>
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <a href="{{ url('/ot/create') }}">
              <h6 class="m-b-20">Nueva OT</h6>
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
            <a href="{{ url('/ose/showOse') }}">
              <h6 class="m-b-20">Ver OSE's</h6>
            </a>
            <br>
              <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
      <!--<div class="col-md-4 col-xl-3">
        <div class="card bg-c-pink order-card">
          <div class="card-block">
            <a href="{{ url('/ose/createOse') }}">
              <h6 class="m-b-20">Nueva OSE</h6>
            </a>
            <br>
              <h2 class="text-right"><i class="fas fa-plus-circle f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>
-->
        </div>

</div>
</center>
@endsection
