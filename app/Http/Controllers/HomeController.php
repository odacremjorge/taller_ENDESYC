<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Operator;
use App\Models\Vehicle;
use Illuminate\Http\Request;

use App\Models\OT;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $operators=Assignment::select('assignments.id','operators.code_operator','operators.name_operator','operators.phone','vehicles.cia', 'vehicles.plate','vehicles.type','section_assign')
        ->join('operators','assignments.operator_id','=','operators.id')
        ->join('vehicles','assignments.vehicle_id','=','vehicles.id')->get();
        $ots_status = OT::all();
        
        return view('home', compact('operators', 'ots_status'));


    }
    public function report()
    {
        return view('report.index');
    }
    public function Showday()
    {
        
        return view('report.day');
    }
    public function Showweek()
    {
        return view('report.week');
    }
    public function Showmonth()
    {
        return view('report.month');
    }
    public function day(Request $request)
    {
        //dd($request->Day.' '.$request->Select);
        $validatedData=$request->validate([
            'Day' => ['required'],
                  
        ]);
        $date_report=$request->Day;
        $condition_report=$request->Select;
        if ($request->Select == 'Todos')
        {
            $ot_rep_day = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            ->whereDate('Date',$request->Day)
            ->orWhereDate('DateFinish',$request->Day)
            ->get();
        
        }
        else
        {
            $ot_rep_day = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            
            ->whereDate('Date',$request->Day)
            ->where('condition', 'LIKE', '%' . $request->Select . '%')
            ->orWhereDate('DateFinish',$request->Day)
            ->where('condition', 'LIKE', '%' . $request->Select . '%')
            ->get();
            
        }
        //dd($ot_rep_day);
       // return view('report.day');
       // return Excel::download(new UsersExport($request->Day,$request->Select), 'informe-diario.xlsx');

        $pdf = PDF::loadView('report.dayPDF',['ot_rep_day'=>$ot_rep_day, 'date_report'=>$date_report, 'condition_report'=>$condition_report])
        ->setPaper('letter', 'landscape');
        return $pdf->stream('report.dayPDF',array('Attachment'=>false));
    }

    public function week(Request $request)
    {
        $validatedData=$request->validate([
            'DayInit' => ['required'],
            'DayEnd' => ['required'],
        ]);
        $date_report_init=$request->DayInit;
        $date_report_end=$request->DayEnd;
        $condition_report=$request->SelectWeek;
        
        if ($request->SelectWeek == 'Todos')
        {
            $ot_rep_week = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            ->whereDate('Date','>=',$request->DayInit)
            ->whereDate('Date','<=',$request->DayEnd)
            ->orWhereDate('DateFinish','<=',$request->DayEnd)
            ->whereDate('DateFinish','>=',$request->DayInit)
            
            ->get();
        }
        else
        {
            $ot_rep_week = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            ->whereDate('Date','>=',$request->DayInit)
            ->where('condition', 'LIKE', '%' . $request->SelectWeek . '%')
            ->whereDate('Date','<=',$request->DayEnd)
            ->where('condition', 'LIKE', '%' . $request->SelectWeek . '%')
            ->orWhereDate('DateFinish','<=',$request->DayEnd)
            ->where('condition', 'LIKE', '%' . $request->SelectWeek . '%')
            ->whereDate('DateFinish','>=',$request->DayInit)
            ->where('condition', 'LIKE', '%' . $request->SelectWeek . '%')
            //->where('condition', 'LIKE', '%' . $request->SelectWeek . '%')
            ->get();
        }

        $pdf = PDF::loadView('report.weekPDF',['ot_rep_week'=>$ot_rep_week,'date_report_init'=>$date_report_init,'date_report_end'=>$date_report_end, 'condition_report'=>$condition_report])
        ->setPaper('letter', 'landscape');
        return $pdf->stream('report.weekPDF',array('Attachment'=>false));
        
    }

    public function month(Request $request)
    {
        switch ($request->Month) {

            case "1":
                $date_report_init="2022-01-01";
                $date_report_end="2022-01-31";
                $month_report="ENERO";
            break;
            case "2":
                $date_report_init="2022-02-01";
                $date_report_end="2022-02-28";
                $month_report="FEBRERO";
            break;
            case "3":
                $date_report_init="2022-03-01";
                $date_report_end="2022-03-31";
                $month_report="MARZO";
            break;
            case "4":
                $date_report_init="2022-04-01";
                $date_report_end="2022-04-30";
                $month_report="ABRIL";
            break;
            case "5":
                $date_report_init="2022-05-01";
                $date_report_end="2022-05-31";
                $month_report="MAYO";
            break;
            case "6":
                $date_report_init="2022-06-01";
                $date_report_end="2022-06-30";
                $month_report="JUNIO";
            break;
            case "7":
                $date_report_init="2022-07-01";
                $date_report_end="2022-07-31";
                $month_report="JULIO";
            break;
            case "8":
                $date_report_init="2022-08-01";
                $date_report_end="2022-08-31";
                $month_report="AGOSTO";
            break;
            case "9":
                $date_report_init="2022-09-01";
                $date_report_end="2022-09-30";
                $month_report="SEPTIEMBRE";
            break;
            case "10":
                $date_report_init="2022-10-01";
                $date_report_end="2022-10-31";
                $month_report="OCTUBRE";
            break;
            case "11":
                $date_report_init="2022-11-01";
                $date_report_end="2022-11-30";
                $month_report="NOVIEMBRE";
            break;
            case "12":
                $date_report_init="2022-12-01";
                $date_report_end="2022-12-31";
                $month_report="DICIEMBRE";
            break;
        }
        $condition_report=$request->SelectMonth;
        if ($request->SelectMonth == 'Todos')
        {
        $ot_rep_month = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
        ->join('clients','o_t_s.client_id','=','clients.id')
        ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
        ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
        ->whereDate('Date','>=',$date_report_init)
        ->whereDate('Date','<=',$date_report_end)
        ->orWhereDate('DateFinish','<=',$date_report_end)
        ->whereDate('DateFinish','>=',$date_report_init)
        ->get();
        }
        else
        {
            $ot_rep_month = OT::select('o_t_s.*','clients.name_client','vehicles.cia','vehicles.plate','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            ->whereDate('Date','>=',$date_report_init)
            ->where('condition', 'LIKE', '%' . $request->SelectMonth . '%')
            ->whereDate('Date','<=',$date_report_end)
            ->where('condition', 'LIKE', '%' . $request->SelectMonth . '%')
            ->orWhereDate('DateFinish','<=',$date_report_end)
            ->where('condition', 'LIKE', '%' . $request->SelectMonth . '%')
            ->whereDate('DateFinish','>=',$date_report_init)
            ->where('condition', 'LIKE', '%' . $request->SelectMonth . '%')
            ->get();
        }

        //dd($date_report_init.' '.$date_report_end);
        $pdf = PDF::loadView('report.monthPDF',['ot_rep_month'=>$ot_rep_month,'month_report'=>$month_report, 'condition_report'=>$condition_report])
        ->setPaper('letter', 'landscape');
        return $pdf->stream('report.monthPDF',array('Attachment'=>false));
    }

    
    public function assignPDF($id)
    {
        //
        $assign=Assignment::select('assignments.id','inventory_assign','condition_vehicle','operators.code_operator','operators.name_operator','operators.phone','vehicles.cia', 'vehicles.plate','section_assign','DateAssign')
        ->join('operators','assignments.operator_id','=','operators.id')
        ->join('vehicles','assignments.vehicle_id','=','vehicles.id')
        ->where('assignments.id', $id)
        ->first();

        $vehicle=Vehicle::select(
            'cia',
            'company',
            'plate',
            'type', 
            'mark', 
            'model', 
            'year',
            'color', 
            'displacement', 
            'motor_type',
            'serie', 
            'chassis'
            )
            ->join('assignments', 'assignments.vehicle_id','=','vehicles.id')
            ->where('assignments.id', $id)
            ->first();

            $operator=Operator::select(
                'name_operator',
                'type_operator',
                'phone',
                'code_operator', 
                'ci'
            )
            ->join('assignments', 'assignments.operator_id','=','operators.id')
            ->where('assignments.id', $id)
            ->first();

        $assignments = Assignment::all();

        $pdf = PDF::loadView('assign.assignPDF',['assign'=>$assign, 'vehicle'=> $vehicle, 'operator'=> $operator]);
        
        return $pdf->stream('assign.assignPDF',array('Attachment'=>false));
       
    }

    public function listAssignPDF()
    {
        //
        

        $operators=Assignment::select('assignments.id','operators.code_operator','operators.name_operator','operators.phone','vehicles.cia', 'vehicles.plate','vehicles.type','section_assign')
        ->join('operators','assignments.operator_id','=','operators.id')
        ->join('vehicles','assignments.vehicle_id','=','vehicles.id')->get();
        
       

        $pdf = PDF::loadView('assign.listAssignPDF',['operators'=>$operators]);
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();
        //return view('operator.listPDF', compact('operators'));

       //$pdf = PDF::loadView('operator.listPDF', ['operators' => $operators])->setOptions(['defaultFont' => 'sans-serif']);

       //$dompdf->stream('my.pdf',array('Attachment'=>0));.
        return $pdf->stream('assign.listAssignPDF',array('Attachment'=>false));
       
    }

    
}
