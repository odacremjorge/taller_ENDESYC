<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'chassis', 
     ];
}
