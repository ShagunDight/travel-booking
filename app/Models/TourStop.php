<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourStop extends Model
{
    protected $fillable = [
        'tour_id',
        'day_number',
        'location',
        'hotel_id',
        'description'
    ];

    public function tour() {
        return $this->belongsTo(Tour::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
}
