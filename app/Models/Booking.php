<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [ 
        'user_id',
        'bookable_id',
        'bookable_type',
        'check_in',
        'check_out',
        'booking_date',
        'guests',
        'amount',
        'status',
        'meta' 
    ]; 
    
    protected $casts = [ 
        'check_in' => 'date', 
        'check_out' => 'date', 
        'meta' => 'array', 
    ]; 
    
    public function user() { 
        return $this->belongsTo(User::class); 
    } 
    
    public function bookable() { 
        return $this->morphTo(); 
    }
}
