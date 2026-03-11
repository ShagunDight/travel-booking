<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [ 
        'property_id',
        'name',
        'capacity',
        'price_per_night',
        'refundable',
        'free_cancel_until',
        'features',
        'description',
    ]; 
    
    protected $casts = [ 
        'features' => 'array', 
        'free_cancel_until' => 'date', 
        'refundable' => 'boolean', 
    ]; 
    
    public function property() { 
        return $this->belongsTo(Property::class); 
    }
    
    public function bookings() { 
        return $this->morphMany(Booking::class, 'bookable'); 
    }

    public function scopeAvailable($query, $checkIn, $checkOut, $guests)
    {
        return $query->where('capacity', '>=', $guests)
            ->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {
                $q->where('status', '!=', 'cancelled')
                  ->where(function ($q) use ($checkIn, $checkOut) {
                      $q->whereBetween('check_in', [$checkIn, $checkOut])
                        ->orWhereBetween('check_out', [$checkIn, $checkOut])
                        ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                            $q2->where('check_in', '<=', $checkIn)
                               ->where('check_out', '>=', $checkOut);
                        });
                  });
            });
    }
}
