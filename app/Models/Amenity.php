<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name',
        'type'
    ]; 
    
    public function properties() { 
        return $this->belongsToMany(Property::class)->withTimestamps(); 
    }
}
