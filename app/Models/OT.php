<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost_center',
        'section',
        'mileage',
        'inventory',
        'observation',
        'fuel',
        'condition',
        'job',
        'manager',
        'ObservationCancel',
        'Date',
        'DateFinish',
        'TimeFinish',
        'ObservationFinish',
        'client_id',
        'operator_id',
        'user_id',
     ];
}
