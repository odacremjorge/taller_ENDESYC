
<table>
        <thead>
            <tr>
                <th>N°</th>
                <th>OT</th>
                <th>CIA</th>
                <th>PLACA</th>
                <th>CLIENTE</th>
                <th>FECHA RECEPCION</th>
                <th>FECHA FINALIZACION</th>
                <th>DETALLE</th>
                <th>TIPO</th>
                <!--<th>REPUESTOS</th>-->
            </tr>
        </thead>              
                   
        <tbody>
        @foreach ($ot_rep_day as $data)
        @php
            $jobs=json_decode($data->job);
                 
        @endphp
        <tr>
                <td></td>
                <td > {{$data->id}}</td>
                <td > {{$data->cia}}</td>
                <td > {{$data->plate}}</td>
                <td > {{$data->name_client}}</td>
                <td > {{$data->Date}}</td>
                <td > {{$data->DateFinish}} {{$data->TimeFinish}}</td>
                <td>
                    @foreach ($jobs->job as $data_job)
                     {{$data_job}}, 
                    @endforeach
                </td>
                <td > {{$data->type}}</td>
        </tr>
        </tbody>  
              
        @endforeach
       
             
</table>


 

