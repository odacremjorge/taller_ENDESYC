<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'ot_id',
        'vehicle_id',
     ];
}

