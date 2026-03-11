<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Create Razorpay order
    public function createOrder(Request $request)
    {
        $amount = $request->amount;

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $order = $api->order->create([
            'receipt' => 'order_rcptid_' . time(),
            'amount' => $amount * 100,
            'currency' => 'INR'
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount' => $amount,
            'key' => config('services.razorpay.key')
        ]);
    }

    // Verify Razorpay payment
    public function verifyPayment(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Save payment in DB
            Payment::create([
            'tour_id' => $request->payable_type == 'tour' ? $request->payable_id : null,
            'hotel_id' => $request->payable_type == 'hotel' ? $request->payable_id : null,
            'user_id' => auth()->id(),
            'payable_id' => $request->payable_id,       // hotel or tour id
            'payable_type' => $request->payable_type,   // 'hotel' or 'tour'
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_signature' => $request->razorpay_signature,
            'amount' => $request->amount,
            'status' => 'success',
            'payment_method' => 'Razorpay'
        ]);
            return response()->json([
    'status' => 'success',
    
    'redirect' => $request->payable_type == 'tour'
        ? route('tour.booking.success', ['order_id' => $request->razorpay_order_id])
        : route('hotel.booking.success', ['order_id' => $request->razorpay_order_id])
]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}