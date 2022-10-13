<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Operator;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            return view('assign.create');
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
        $validatedData=$request->validate([
            'Codigo' => ['required', 'max:10'],
            'Seccion' => ['required','string', 'max:100'],
            'Cia' => ['required', 'max:10'],
        ]);
           
            
            session_start();
            
            $DateAndTime = $_SESSION['variable'];

                   

        $toJson = json_encode([
            'inventory' => $request->get('inv'),
            
        ]);

        $OperadorId = Operator::where('code_operator', $request->Codigo)->first();
        $VehicleId = Vehicle::where('cia', $request->Cia)->first();

        date_default_timezone_set("America/La_Paz");
        $date = Carbon::now('-04');

        Assignment::create([
            'condition_vehicle'=> $request->EstadoVehiculo,
            'inventory_assign'=> $toJson,
            'section_assign'=> $request->Seccion,
            'operator_id'=> $OperadorId->id ,
            'vehicle_id'=> $VehicleId->id ,
            'DateAssign'=> $date,

                    
        ]);
        return redirect('/home')->with('Mensaje', 'HEY, Vehículo asignado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assign)
    {
        //
        
        $assign->delete();
              
        return redirect()->back()->with('Mensaje', 'HEY, Asignación eliminada satisfactoriamente!!!');
       
    }
}
