<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_demand',
        'mileage_demand',
        'date_demand',
        'section_demand',
        'jobDemand',
        'date_approval',
        'workshop_demand',
        'vehicle_id',
        
     ];
}
