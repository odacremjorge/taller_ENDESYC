<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicles = Vehicle::all();
        return view('demand.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $demands=Demand::select('demands.id','vehicles.cia', 'vehicles.plate',
        'driver_demand',
        'mileage_demand',
        'date_demand',
        'section_demand',
        'jobDemand',
        'date_approval',
        'workshop_demand',
        'ccDemand',
        )
        ->join('vehicles','demands.vehicle_id','=','vehicles.id')
        ->where('vehicle_id',$id)->get();

        $vehicle = Vehicle::findOrFail($id);
        return view('demand.create', ['vehicle' => $vehicle, 'demands' => $demands]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $toJsonJob = json_encode([
            'jobDemand' => $request->get('data'),
            
        ]);

        $demand=Demand::create([

            'driver_demand'=> $request->Conductor,
            'mileage_demand'=> $request->Kilometraje,
            'date_demand'=> $request->Fecha,
            'section_demand'=> $request->Seccion,
            'jobDemand'=> $toJsonJob,
            'date_approval'=> $request->FechaAprobacion,
            'ccDemand'=> $request->Centro,
            'vehicle_id'=> $request->vehicle_id,

           
                        
        ]);
        return redirect('/demand/create/'.$request->vehicle_id)->with('Mensaje', 'HEY, Repuesto creado satisfactoriamente!!!');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        //
        $demand->delete();
       
       
        return redirect()->back()->with('Mensaje', 'HEY, Solicitud eliminado satisfactoriamente!!!');
    }
    public function demandPDF($id)
    {    
      

        $demands = Demand::findOrFail($id);
        $aux = $demands->vehicle_id;
        $vehicle = Vehicle::findOrFail($aux);

        $pdf = PDF::loadView('demand.demandPDF',['demands'=>$demands, 'vehicle'=>$vehicle]);
        
        return $pdf->stream('demand.demandPDF',array('Attachment'=>false));
       
    }

}
