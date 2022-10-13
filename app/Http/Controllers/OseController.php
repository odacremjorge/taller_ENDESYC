<?php

namespace App\Http\Controllers;

use App\Models\Ose;
use App\Models\OT;
use App\Models\Operator;
use App\Models\Vehicle;
use App\Models\Client;
use App\Models\User;
use App\Models\OTDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class OseController extends Controller
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
        return view('ose.createOse');
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
            'Empresa' => ['required'],
           
          
        ]);

        session_start();
            
        $DateAndTime = $_SESSION['variable'];

        $toJsonJob = json_encode([
            'job' => $request->get('data'),
            
        ]);

        date_default_timezone_set("America/La_Paz");
            $date = Carbon::now('-04');

        $OSE=Ose::create([

            'workshop'=> $request->Empresa,
            'price_ose'=> $request->Precio,
            'jobOSE'=> $toJsonJob,
            'DateOSE'=> $date,
            'ot_id'=> $request->Ot_id,
            
    
                        
        ]);
        return redirect('/ose/showOse')->with('Mensaje', 'HEY, OSE creada satisfactoriamente!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ose  $ose
     * @return \Illuminate\Http\Response
     */
    public function show(Ose $ose)
    {
        //
        $operators=Ose::select('oses.id','workshop','vehicles.cia','vehicles.plate','oses.ot_id')
        ->join('o_t_s','oses.ot_id','=','o_t_s.id')
        //->where('o_t_s.id', $ose)
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
        ->get();

        return view('ose.showOse', compact('operators'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ose  $ose
     * @return \Illuminate\Http\Response
     */
    public function edit(Ose $ose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ose  $ose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ose $ose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ose  $ose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ose $ose)
    {
        //
    }
    public function create_ose($id)
    {
        //
        $ot = OT::where('id', $id)->first();

        

        return view('ose.createOse', compact ('ot'));

    }
    public function osePDF($id)
    {
       
        $oses=Ose::select('oses.id', 'workshop','price_ose','DateOSE','ot_id','o_t_s.cost_center', 'jobOSE', 'clients.name_client')
        ->join('o_t_s','oses.ot_id','=','o_t_s.id')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->where('oses.id', $id)
        ->first();

        $IDot = $oses->ot_id;

        $vehicle=OT::select('o_t_s.id','vehicles.cia','vehicles.plate','vehicles.company','vehicles.type','vehicles.mark','vehicles.model','vehicles.year','vehicles.color','vehicles.displacement','vehicles.motor_type','vehicles.serie','vehicles.chassis')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
        ->where('o_t_s.id', $IDot)
        ->first();

       
        $pdf = PDF::loadView('ose.osePDF',['oses'=>$oses,'vehicle'=>$vehicle]);
        
        return $pdf->stream('ose.osePDF',array('Attachment'=>false));
       
    }
}
