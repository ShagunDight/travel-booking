<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'name',
        'type',
        'slug',
        'price',
        'image',
        'description',
        'popular',
        'duration', 
        'short_description',
        'capmping',
    ]; 
    
    public function rooms() { 
        return $this->belongsToMany(Room::class); 
    } 
    
    public function tours() { 
        return $this->belongsToMany(Tour::class); 
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'type_id')->where('type', 2);
    }

    public function package_images()
    {
        return $this->hasOne(Image::class, 'type_id')->where('type', 2);
    }
    
    public function bookings() { 
        return $this->morphMany(Booking::class, 'bookable'); 
    }
}
