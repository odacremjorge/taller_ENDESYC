<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ose extends Model
{
    use HasFactory;
    protected $fillable = [
        'workshop',
        'price_ose',
        'jobOSE',
        'DateOSE',
        'ot_id',
     ];
}

