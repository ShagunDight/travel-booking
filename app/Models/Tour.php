<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'name', 
        'slug', 
        'location', 
        'price',
        'duration',
        'description',
        'features',
        'capmping',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable'); 
    }

    public function tour_images()
    {
        return $this->hasOne(Image::class, 'type_id')->where('type', 3);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'type_id')->where('type', 3);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class); 
    } 
    
    public function inclusions()
    {
        return $this->hasMany(Inclusion::class); 
    } 
    
    public function exclusions()
    {
        return $this->hasMany(Exclusion::class); 
    } 
    
    public function policies()
    {
        return $this->hasOne(Policy::class);
    }

    public function stops()
    {
        return $this->hasMany(TourStop::class)->orderBy('day_number');
    }

}
