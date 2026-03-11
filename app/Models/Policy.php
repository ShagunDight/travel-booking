<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'tour_id',
        'cancellation',
        'refund',
        'other_rules'
    ]; 
    
    public function tour() { 
        return $this->belongsTo(Tour::class); 
    }
}
