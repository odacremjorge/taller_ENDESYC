<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_operator',
        'type_operator',
        'phone',
        'code_operator', 
        'ci',
        
     ];
}
