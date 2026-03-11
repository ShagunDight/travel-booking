<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
    protected $fillable = [
        'tour_id',
        'text'
    ]; 
    
    public function tour() { 
        return $this->belongsTo(Tour::class); 
    }
}
