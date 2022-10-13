<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\OT;
use App\Models\OtEntry;
use App\Models\Operator;
use App\Models\Replacement;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class RecordController extends Controller
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
        return view('record.index', compact('vehicles'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $vehicle = Vehicle::where('id', $id)->first();
       
        return view('record.create', compact('vehicle'));
       // return view('record.create');
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
            'Ot_historial' => ['required'],
           
          
        ]);
       
        $VehicleId = Vehicle::where('cia', $request->vehicle_cia)->first();
    
       
    
        $record=Record::create([
    
            'maintenance_type'=> $request->Type,
            'lublicant'=> $request->Lubricante,
            'filter'=> $request->Filtro,
            'vehicle_id'=> $VehicleId->id,
           
    
                        
        ]);
    
        OtEntry::Create([

            'record_id'=>$record->id,
            'ot_id'=>$request->Ot_historial,
            
    
        ]);
        return redirect('/record')->with('Mensaje', 'HEY, historial guardada satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }

    public function list_record()
    {
        $vehicles = Vehicle::all();
        return view('record.list_record', compact('vehicles'));
    }
    
    public function recordPDF($id)
    {
       
       


        $records=Record::all();

        
         
        
        $record_vehicle=Vehicle::select('vehicles.id','vehicles.type','o_t_s.id','o_t_s.mileage','o_t_s.Date','records.maintenance_type','records.lublicant','records.filter','operators.name_operator','o_t_s.job')
        ->join('records','records.vehicle_id','=','vehicles.id')
        ->join('ot_entries','ot_entries.record_id','=','records.id')
        ->join('o_t_s','ot_entries.ot_id','=','o_t_s.id')
        ->join('operators','o_t_s.operator_id','=','operators.id')
       
       // ->select('replacements.description',DB::raw('replacements','o_t_s')->where('replacements.ot_id','o_t_s.id'))
        //->groupBy('replacements.description')
        //->join('replacements','replacements.ot_id','=','o_t_s.id')
        
        ->where('vehicles.id', $id)
        
        ->get();

        $record_replacement=Vehicle::select('vehicles.id','o_t_s.id','o_t_s.mileage','o_t_s.Date','records.maintenance_type','records.lublicant','records.filter','operators.name_operator','replacements.description','replacements.unit','replacements.amount')
        ->join('records','records.vehicle_id','=','vehicles.id')
        ->join('ot_entries','ot_entries.record_id','=','records.id')
        ->join('o_t_s','ot_entries.ot_id','=','o_t_s.id')
        ->join('operators','o_t_s.operator_id','=','operators.id')
       
       // ->select('replacements.description',DB::raw('replacements','o_t_s')->where('replacements.ot_id','o_t_s.id'))
        //->groupBy('replacements.description')
        ->join('replacements','replacements.ot_id','=','o_t_s.id')
        
        ->where('vehicles.id', $id)
        
        ->get();
        
       

        $vehicle = Vehicle::where('id', $id)->first();

        $pdf = PDF::loadView('record.recordPDF',['records'=>$records,'vehicle'=>$vehicle,'record_vehicle'=>$record_vehicle,'record_replacement'=>$record_replacement])
        ->setPaper('letter', 'landscape');
        
        

        return $pdf->stream('record.recordPDF',array('Attachment'=>false));
       
    }

}

