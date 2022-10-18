@extends('layouts.layoutSecondary')

@section('content')
      
<br><br>        
<section class="form-register">
<center><h4>Informe Semanal</h4></center>
        <form action="{{route ('report.week')}}" target="_blank" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="row">
                
                <div class="col-xl-4">
                <label>Ingrese el dia inicio (aaaa-mm-dd)</label><br><br>
                        <input class="controls @error('DayInit') is-invalid @enderror" type="date" name="DayInit" id="DayInit" placeholder="Ingrese el dia de inicio *" maxlength="20" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 45)||(event.keyCode > 45 && event.keyCode < 48)||(event.keyCode > 58 && event.keyCode < 256)) event.returnValue = false;">
                        @error('DayInit')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>    
                </div>

                <div class="col-xl-4">
                <label>Ingrese el dia final (aaaa-mm-dd)</label><br><br>
                        <input class="controls  @error('DayEnd') is-invalid @enderror" type="date" name="DayEnd" id="DayEnd" placeholder="Ingrese el dia final *" maxlength="20" onKeypress="if ((event.keyCode > 0 && event.keyCode < 32)||(event.keyCode > 32 && event.keyCode < 45)||(event.keyCode > 45 && event.keyCode < 48)||(event.keyCode > 58 && event.keyCode < 256)) event.returnValue = false;">
                        @error('DayEnd')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <br>    
                </div>
                
                <div class="col-xl-4">
                <label>Seleccione los datos a generar</label><br><br>
                        <select class="controls"  name="SelectWeek" id="SelectWeek" >
                                
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