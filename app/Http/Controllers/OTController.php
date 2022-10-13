<?php

namespace App\Http\Controllers;

use App\Models\OT;
use App\Models\Operator;
use App\Models\Vehicle;
use App\Models\Client;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Replacement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\OTDetail;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Http\Requests\RequestOT;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class OTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        
        return view('ot.index');
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestOT $request)
    {
        //
        
        session_start();
            
        $DateAndTime = $_SESSION['variable'];

   


    $toJson = json_encode([
        'inventory' => $request->get('inv'),
        
    ]);

    $toJsonJob = json_encode([
        'job' => $request->get('data'),
        
    ]);

    

    $ClientId = Client::where('name_client', $request->Cliente)->first();
    $OperadorId = Operator::where('name_operator', $request->Conductor)->first();
    $VehicleId = Vehicle::where('cia', $request->Cia)->first();

    date_default_timezone_set("America/La_Paz");
    $date = Carbon::now('-04');


    $OT=OT::create([

        'cost_center'=> $request->CentroCostos,
        'section'=> $request->Seccion,
        'mileage'=> $request->Kilometraje,
        'inventory'=> $toJson,
        'observation'=> $request->Obvs,
        'fuel'=> $request->Combustible,
        'condition'=> 'Abierto',
        'manager'=> $request->Encargado,
        'job'=> $toJsonJob,
        'Date'=> $date,
        'client_id'=> $ClientId->id,
        'operator_id'=> $OperadorId->id,
        'user_id'=> Auth::user()->id,

                    
    ]);

    OTDetail::Create([

        'ot_id'=>$OT->id,
        'vehicle_id'=>$VehicleId->id,

    ]);
    $ID=$OT->id;
    $this->otPDF($ID);
    return redirect('/ot/showOT')->with('Mensaje', 'HEY, OT creada satisfactoriamente!!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // OT $oT
        
        $operators=OT::select('o_t_s.id','clients.name_client','vehicles.cia','vehicles.plate','condition')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')->get();

        return view('ot.showOT', compact('operators'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function edit(OT $ot)
    {
        //
        //dd($ot->section);
        
        $replacements=Replacement::select('replacements.id','operators.name_operator','codigo','description','amount','unit','price_replacement','num_replacement')
        ->join('operators','replacements.operator_id','=','operators.id')
        ->where('ot_id',$ot->id)->get();
       // 
        //->join('vehicles','assignments.vehicle_id','=','vehicles.id')->get();
       return view('ot.edit', compact('ot','replacements'));
      
    
    }

    public function dateMain($id)
    {
        //
       
        //dd($ots);
        $ot = OT::where('id', $id)->first();

        $ots=OT::select('o_t_s.id','inventory','section','mileage','cost_center','observation','fuel','manager','job','Date','operators.code_operator','operators.name_operator','operators.phone','clients.name_client','clients.nit','users.name')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('operators','o_t_s.operator_id','=','operators.id')
        ->join('users','o_t_s.user_id','=','users.id')
       
        ->where('o_t_s.id', $id)
        ->first();

        $operator=Operator::select(
            
            'name_operator',
            'type_operator',
            'phone',
            'code_operator', 
            'ci'
        )
        ->join('o_t_s', 'o_t_s.operator_id','=','operators.id')
        ->where('o_t_s.id', $id)
        ->first();

        $vehicle=OT::select('o_t_s.id','vehicles.cia','vehicles.plate','vehicles.company','vehicles.type','vehicles.mark','vehicles.model','vehicles.year','vehicles.color','vehicles.displacement','vehicles.motor_type','vehicles.serie','vehicles.chassis')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
        ->where('o_t_s.id', $id)
        ->first();

        $replacements=Replacement::select('replacements.id','operators.name_operator','codigo','description','amount','unit','price_replacement')
        ->join('operators','replacements.operator_id','=','operators.id')
        ->where('ot_id',$ot->id)->get();

        return view('ot.dateMain', compact('ot', 'ots','operator', 'vehicle', 'replacements'));
       
          
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OT $oT)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function destroy(OT $oT)
    {
        //
    }

    public function otPDF($id)
    {
       
        $ots=OT::select('o_t_s.id','inventory','section','mileage','cost_center','observation','fuel','manager','job','Date','operators.code_operator','operators.name_operator','operators.phone','clients.name_client','clients.nit','users.name')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('operators','o_t_s.operator_id','=','operators.id')
        ->join('users','o_t_s.user_id','=','users.id')
       
        ->where('o_t_s.id', $id)
        ->first();

        $operator=Operator::select(
            
            'name_operator',
            'type_operator',
            'phone',
            'code_operator', 
            'ci'
        )
        ->join('o_t_s', 'o_t_s.operator_id','=','operators.id')
        ->where('o_t_s.id', $id)
        ->first();

        $vehicle=OT::select('o_t_s.id','vehicles.cia','vehicles.plate','vehicles.company','vehicles.type','vehicles.mark','vehicles.model','vehicles.year','vehicles.color','vehicles.displacement','vehicles.motor_type','vehicles.serie','vehicles.chassis')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
        ->where('o_t_s.id', $id)
        ->first();

        $pdf = PDF::loadView('ot.otPDF',['ots'=>$ots,'operator'=>$operator,'vehicle'=>$vehicle]);
        
        return $pdf->stream('ot.otPDF',array('Attachment'=>false));
       
    }

    public function show_cancel($id)
    {
        //
        $ot = OT::where('id', $id)->first();
        return view('ot.cancel', compact('ot'));

         
       
      
    
    }

    public function cancel(Request $request, $id)
    {
        //
        
        $ot_condition = OT::find($id);
        // Getting values from the blade template form
        $ot_condition->condition =  'Anulado';
        $ot_condition->ObservationCancel = $request->get('Anulacion');
        
        $ot_condition->save();
        return  $this->show();
    }

    public function show_finish($id)
    {
        //
       
        $ot = OT::where('id', $id)->first();
       
       return view('ot.finish', compact('ot'));
      
    
    }

    public function finish(Request $request, $id)
    {
        //
        $validatedData=$request->validate([
            'FechaFinal' => ['required'],
           
          
        ]);
        
        $ot_condition = OT::find($id);
        // Getting values from the blade template form
        $ot_condition->condition =  'Finalizado';
        $ot_condition->DateFinish = $request->get('FechaFinal');
        $ot_condition->TimeFinish = $request->get('HoraFinal');
        $ot_condition->ObservationFinish = $request->get('Finalizacion');
        $ot_condition->save();
        return  $this->show();
    }

}
