@extends('layouts.layoutSecondary')

@section('content')

       
<br><br>        
<section class="form-register">
<center><h4>Informe Mensual</h4></center>
        <form action="{{route ('report.month')}}" target="_blank" method="GET"  enctype="multipart/form-data">
        @csrf
        <div class="row">
                
                <div class="col-xl-6">
                <label>Ingrese el mes del informe requerido</label><br><br>
                <select class="controls"  name="Month" id="Month" >
                                
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                                
                        </select>                          <br>    
                </div>
                
                <div class="col-xl-6">
                <label>Seleccione los datos a generar</label><br><br>
                        <select class="controls"  name="SelectMonth" id="SelectMonth" >
                                
                                <option value="Todos">Todos</option>
                                <option value="Abierto">Abiertos</option>
                                <option value="Finalizado">Finalizados</option>
                                <option value="Anulado">Anulados</option>
                                                                
                        </select>  
                         <br>
                </div> 
               
                
        </div>  
         <center>      
         <input class="botons" type="submit" value="Generar Informe">
        </center>

        </form>
</section>
<br><br><br>
<marquee behavior="scroll" direction="left">
        <img src="{{asset('images/suzuki.png')}}" width="120" height="80" alt="suzuki" />
        <img src="{{asset('images/greatwall.png')}}" width="120" height="80" alt="greatwall" />
        <img src="{{asset('images/mazda.png')}}" width="120" height="80" alt="mazda" />
        <img src="{{asset('images/nissan.png')}}" width="120" height="80" alt="nissan" />
        <img src="{{asset('images/ford.png')}}" width="120" height="80" alt="ford" />
        <img src="{{asset('images/honda.png')}}" width="120" height="80" alt="honda" />
        <img src="{{asset('images/jac.png')}}" width="120" height="80" alt="jac" />
        <img src="{{asset('images/toyota.png')}}" width="120" height="80" alt="toyota" />
        <img src="{{asset('images/vw.png')}}" width="120" height="80" alt="vw" />
        <img src="{{asset('images/higer.png')}}" width="120" height="80" alt="higer" />
        <img src="{{asset('images/lada.png')}}" width="120" height="80" alt="lada" />
        <img src="{{asset('images/fiat.png')}}" width="120" height="80" alt="fiat" />
        <img src="{{asset('images/mit.png')}}" width="120" height="80" alt="mit" />
        <img src="{{asset('images/usm.png')}}" width="120" height="80" alt="usm" />
        <img src="{{asset('images/zna.png')}}" width="120" height="80" alt="zna" />
        <img src="{{asset('images/foton.png')}}" width="120" height="80" alt="foton" />
        <img src="{{asset('images/zon.png')}}" width="150" height="80" alt="zon" />
        <img src="{{asset('images/mack.png')}}" width="120" height="80" alt="mack" />
    </marquee>


@endsection