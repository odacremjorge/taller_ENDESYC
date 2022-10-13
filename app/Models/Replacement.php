<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'unit',
        'description',
        'codigo',
        'price_replacement',
        'num_replacement',
        'operator_id',
        'ot_id',
     ];
}
