<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [ 
        'city_id',
        'name',
        'slug',
        'address',
        'search_address',
        'about',
        'rating_avg',
        'rating_count',
        'policies',
        'featured'
    ];
    
    protected $casts = [
        'policies' => 'array'
    ];
    
    public function city() { 
        return $this->belongsTo(City::class); 
    }
    
    public function rooms() { 
        return $this->hasMany(Room::class); 
    }

    public function minRoomPrice()
    {
        return $this->hasOne(Room::class)->ofMany('price_per_night', 'min');
    }
    
    public function images() { 
        return $this->hasMany(Image::class); 
    }

    public function property_image() { 
        return $this->hasMany(Image::class, 'type_id')->where('type', 1); 
    }
    
    public function amenities() { 
        return $this->belongsToMany(Amenity::class)->withTimestamps(); 
    }

    public function reviews() { 
        return $this->hasMany(Review::class); 
    } 
    
    // simple search scope 
    public function scopeSearch($q, $term) {
        return $q->when($term, fn($qq) => $qq->where('name','like',"%$term%")->orWhere('address','like',"%$term%") ); 
    }

    public function bookings() { 
        return $this->morphMany(Booking::class, 'bookable'); 
    }

    public function scopeAvailable($query, $checkIn, $checkOut, $guests)
    {
        return $query->whereHas('rooms', function ($roomQuery) use ($guests, $checkIn, $checkOut) {
            $roomQuery->where('capacity', '>=', $guests)->whereDoesntHave('bookings', function ($bookingQuery) use ($checkIn, $checkOut) {
                $bookingQuery->where('status', '!=', 'cancelled')->where(function ($q) use ($checkIn, $checkOut) {
                    $q->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                        $q2->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
                });
            });
        });
    }

    public function stops() {
        return $this->hasMany(TourStop::class); 
    }
}
