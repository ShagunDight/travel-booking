<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiInquiry extends Model
{
    use HasFactory; 
    
    protected $fillable = [ 
        'name', 
        'number', 
        'trip_type', 
        'pickup', 
        'drop', 
        'pickup_date', 
        'pickup_time', 
        'return_date', 
        'return_time', 
        'message', 
    ];
}
