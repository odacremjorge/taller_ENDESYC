<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Vehicle;
use App\Models\Operator;
use App\Models\OT;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $Day;
    private $Select;

    public function __construct($Day,$Select)
    {
        $this->Day=$Day;
        $this->Select=$Select;
    }
    
    public function collection()
    {
        if ($this->Select == 'Todos')
        {
            $ot_rep_day = OT::select('o_t_s.id','vehicles.cia','vehicles.plate','clients.name_client','o_t_s.Date','o_t_s.DateFinish','o_t_s.job','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            ->whereDate('Date',$this->Day)
            ->orWhereDate('DateFinish',$this->Day)
            ->get();
        
        }
        else
        {
            $ot_rep_day = OT::select('o_t_s.id','vehicles.cia','vehicles.plate','clients.name_client','o_t_s.Date','o_t_s.DateFinish','o_t_s.job','vehicles.type')
            ->join('clients','o_t_s.client_id','=','clients.id')
            ->join('o_t_details','o_t_details.ot_id','=','o_t_s.id')
            ->join('vehicles','o_t_details.vehicle_id','=','vehicles.id')
            
            ->whereDate('Date',$this->Day)
            ->where('condition', 'LIKE', '%' . $this->Select . '%')
            ->orWhereDate('DateFinish',$this->Day)
            ->where('condition', 'LIKE', '%' . $this->Select . '%')
            ->get();
            
        }
        return ($ot_rep_day );
       
    }
    public function headings():array
    {
        return ["OT","CIA","PLACA","CLIENTE","FECHA DE INICIO","FECHA DE FINALIZACION","TRABAJOS","TIPO"];
    }
    
}
