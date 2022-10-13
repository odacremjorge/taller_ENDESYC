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
    <link href="{{ public_path('css/listAssignPDF.css') }}" rel="stylesheet" type="text">
    
    
    

</head>


<body>
        
    <img class="foto1" src="{{public_path('images/ende.jpg')}}" width="200" loading="lazy" >
    <div class="foto2">
    
        
                            
                <h4> Regional Oruro</h4>
                                
          
    </div>
    <br><br>
    <center><h3>LISTA DE CONDUCTORES</h3></center>
    <center><h5>GERENCIA INDUSTRIAL (Unidad de Talleres)</h5></center>
    <br>

    <center><h5>VEHICULOS ASIGNADOS</h5></center>
    
  
    <table id="myTable1" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cia</th>
                            <th style="width:13%">Placa</th>
                            <th>Tipo</th>
                            <th>Codigo</th>
                            <th style="width:33%">Nombre</th>
                            <th>Telefono</th>
                            <th>Seccion (C-Costos)</th>
                            
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                    
                    @foreach ($operators as $record)
                    
                        <tr>
                   

                        <td><center>{{ $record->cia }}</center></td>
                        <td><center>{{ $record->plate }}<center></td>
                        <td><center>{{ $record->type }}<center></td>
                    
                        <td><center>{{ $record->code_operator }}</center></td>
                        <td>{{ $record->name_operator }}</td>
                        <td><center>{{ $record->phone }}</center></td>
                        <td><center>{{ $record->section_assign }}</center></td>
                        
                        
                        </tr>
                    @endforeach                   
                    </tbody>
                    
                </table>

<footer>
ENDESYC Unidad Talleres Oruro 2022 | Cel: 72085879
</footer>


</body>

</html>
