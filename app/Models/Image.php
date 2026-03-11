<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'type',
        'type_id',
        'url',
        'alt',
        'sort'
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class, 'type_id')->where('type', 2)->orderBy('sort');
    }

    public function property() { 
        return $this->belongsTo(Property::class); 
    }

    public function tourImg() { 
        return $this->belongsTo(Tour::class, 'type_id')->where('type', 3); 
    }
}
