<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Booking;
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

            $p = Payment::create([
                'tour_id' => $request->payable_type == 'tour' ? $request->payable_id : null,
                'hotel_id' => $request->payable_type == 'hotel' ? $request->payable_id : null,
                'user_id' => auth()->id(),
                'payable_id' => $request->payable_id,
                'payable_type' => $request->payable_type,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_signature' => $request->razorpay_signature,
                'amount' => $request->amount,
                'status' => 'success',
                'payment_method' => 'Razorpay'
            ]);

            // ✅ Collect traveler details in JSON
            $travelerDetails = [
                'title'   => $request->title,
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'mobile'     => $request->mobile,
                'moreData' => $request->moreData ?? [],
            ];

            if($request->payable_type == "hotel"){
                $type = "App\Models\Property";
            } else {
                $type = "App\Models\Tour";
            }

            // ✅ Save booking
            $booking = Booking::create([
                'user_id'       => auth()->id(),
                'bookable_id'    => $request->payable_id,
                'bookable_type'  => $type, // 'tour' or 'hotel'
                'traveler_details' => json_encode($travelerDetails),
                'check_in'      => $request->checkIn,
                'check_out'     => $request->checkOut,
                'booking_date'  => date('Y-m-d'),
                'amount'        => $request->amount,
                'guests'        => $request->guests,
                'payment_id'    => $request->razorpay_payment_id,
                'status'        => 'success',
            ]);

            return response()->json([
                'status' => 'success',
                'redirect' => $request->payable_type == 'tour'
                    ? route('tour.booking.success', $booking->id)
                    : route('hotel.booking.success', $booking->id)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}