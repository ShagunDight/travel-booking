<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    protected $fillable = [
        'tour_id',
        'text'
    ]; 
    
    public function tour() { 
        return $this->belongsTo(Tour::class); 
    }
}
