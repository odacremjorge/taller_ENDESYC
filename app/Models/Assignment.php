<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'condition_vehicle',
        'inventory_assign',
        'section_assign',
        'DateAssign',
        'operator_id',
        'vehicle_id',
     ];
}
