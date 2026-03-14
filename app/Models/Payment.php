<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

   class Payment extends Model
{
    protected $fillable = [
    'user_id',
    'tour_id',
    'hotel_id',
    'payable_id',      // hotel or tour id
    'payable_type',    // 'hotel' or 'tour'
    'razorpay_payment_id',
    'razorpay_order_id',
    'razorpay_signature',
    'amount',
    'status',
    'payment_method',
    'booking_id'
];


    public function tour() {
        return $this->belongsTo(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payable()
    {
        return $this->morphTo();  // works for both Tour or Hotel
    }
        
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            $lastPayment = Payment::orderBy('id','desc')->first();
            if ($lastPayment && $lastPayment->booking_id) {
                $lastNumber = (int) str_replace('BS-', '', $lastPayment->booking_id);
                $payment->booking_id = 'BS-' . ($lastNumber + 1);
            } else {
                $payment->booking_id = 'BS-1001';
            }
        });
    }
    
    public function hotel()
    {
        return $this->belongsTo(\App\Models\Property::class, 'hotel_id');
    }
}
