<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Taller Endesyc Oruro' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/operators.css') }}" rel="stylesheet" type="text">
    
    
    

</head>


<body>
        
    <img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <table class="foto2">
    
       
                            
                <td><h4><center>ORURO</center></h4></td>
                                
              
    </table>
    <br><br>
    <center><h3>LISTA DE OPERADORES</h3></center>
    <center><h5>GERENCIA INDUSTRIAL (Unidad de Talleres)</h5></center>
    <br><br>

    <center><h5>RESPONSABLES</h5></center>
    @foreach ($operators as $record)
        @if ($record->type_operator == "Responsable")
            <div class="caja">
            
                    
                <h5>NOMBRE: <a>{{ $record->name_operator }}</a></h5>
                <h5>CODIGO: <a>{{ $record->code_operator }}</a></h5>
                <h5>TIPO: <a>{{ $record->type_operator }}</a></h5>
                <h5>CELULAR: <a>{{ $record->phone }}</a></h5>
                <h5>C.I.: <a>{{ $record->ci }}</a></h5>
                    
            
            </div>
        @endif    
        
    @endforeach  
    <center><h5>CONDUCTORES</h5></center>
    @foreach ($operators as $record)
        @if ($record->type_operator == "Conductor")
            <div class="caja">
            
                    
                <h5>NOMBRE: <a>{{ $record->name_operator }}</a></h5>
                <h5>CODIGO: <a>{{ $record->code_operator }}</a></h5>
                <h5>TIPO: <a>{{ $record->type_operator }}</a></h5>
                <h5>CELULAR: <a>{{ $record->phone }}</a></h5>
                <h5>C.I.: <a>{{ $record->ci }}</a></h5>
                    
            
            </div>
        @endif    
        
    @endforeach  
    <center><h5>MECANICOS</h5></center>
    @foreach ($operators as $record)
        @if ($record->type_operator == "Mecanico")
            <div class="caja">
            
                    
                <h5>NOMBRE: <a>{{ $record->name_operator }}</a></h5>
                <h5>CODIGO: <a>{{ $record->code_operator }}</a></h5>
                <h5>TIPO: <a>{{ $record->type_operator }}</a></h5>
                <h5>CELULAR: <a>{{ $record->phone }}</a></h5>
                <h5>C.I.: <a>{{ $record->ci }}</a></h5>
                    
            
            </div>
        @endif    
        
    @endforeach  
  
<footer>
ENDESYC Unidad Talleres Oruro 2022 | Cel: 72085879
</footer>


</body>

</html>
