<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Operator;
use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehicle.create');
    }

    public function price()
    {
        //
        return view('vehicle.price');
    }

    public function list()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.list', compact('vehicles'));
    }

    public function assign()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData=$request->validate([
            'Cia' => ['required', 'max:10'],
            'Company' => ['required', 'max:100'],
            'Plate' => ['required', 'max:10'],
          
        ]);
        //
      
        Vehicle::create([
            'cia' => $request->Cia,
            'company' => $request->Company,
            'plate' => $request->Plate,
            'type' => $request->Type,
            'mark' => $request->Mark,
            'model' => $request->Model,
            'year' => $request->Year,
            'color' => $request->Color,
            'displacement' => $request->Displacement,
            'motor_type' => $request->Motor_type,
            'serie' => $request->Serie,
            'chassis' => $request->Chassis
        ]);
        return redirect('/vehicle')->with('Mensaje', 'HEY, Vehículo creado satisfactoriamente!!!');
       
        //return view('vehiculo.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicle.edit', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $vehicle = Vehicle::findOrFail($id);
            $vehicle->cia = $request->Cia;
            $vehicle->company = $request->Company;
            $vehicle->plate = $request->Plate;
            $vehicle->type = $request->Type;
            $vehicle->mark = $request->Mark;
            $vehicle->model = $request->Model;
            $vehicle->year = $request->Year;
            $vehicle->color = $request->Color;
            $vehicle->displacement = $request->Displacement;
            $vehicle->motor_type = $request->Motor_type;
            $vehicle->serie = $request->Serie;
            $vehicle->chassis = $request->Chassis;
        $vehicle->save();
        return redirect('/vehicle/list')->with('Mensaje', 'HEY, Vehículo actualizado satisfactoriamente!!!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
        $vehicle->delete();
       
       
        return redirect()->back()->with('Mensaje', 'HEY, Vehículo eliminado satisfactoriamente!!!');
       
    }

    
    public function autocomplete_vehicle(Request $request)
    {
        $search1_text = $request->search1;
        $vehicle_data = Vehicle::where('cia', 'LIKE', '%'. $search1_text. '%')->get();
        return json_encode($vehicle_data,JSON_FORCE_OBJECT);
    }
    public function getData_vehicle(Request $request)
    {
        $id = $request->id;
        $vehicle_data = Vehicle::findOrFail($id);
       
        return json_encode($vehicle_data,JSON_FORCE_OBJECT);
    }

    public function getData_vehicleAssign(Request $request)
    {
        $id = $request->id;
        $vehicle_data = Vehicle::findOrFail($id);
        $ownerExist = Assignment::where('vehicle_id', '=', $vehicle_data->id)->exists();
        if ($ownerExist == true)
        {
            $vehicle_data = array(
                'message_error'=>'ok',
                
            );
            return json_encode($vehicle_data,JSON_FORCE_OBJECT);   
        }
        return json_encode($vehicle_data,JSON_FORCE_OBJECT);
    }
}

