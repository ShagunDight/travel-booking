<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Room;
use App\Models\Banner;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        $banner = Banner::where('type', 'Hotel')->latest()->first();
        $hotels = Property::where('featured', 1)->with('city','property_image','minRoomPrice')->latest()->paginate(4);
        return view('hotels.index', compact('banner','hotels'));
    }

    // public function search_hotel(Request $request)
    // {
    //     $data = $request->only([
    //         'location',
    //         'date_range',
    //         'guests'
    //     ]);

    //     if (empty($data['location']) && empty($data['date_range']) && empty($data['guests'])) {
    //         $hotels = Property::with('city','property_image','minRoomPrice')
    //             ->latest()
    //             ->paginate(10);

    //         return view('hotels.hotel_list', compact('hotels','data'));
    //     }

    //     [$checkIn, $checkOut] = array_map('trim', explode('to', $request->date_range));
    //     $guestsRaw = $request->guests;
    //     preg_match('/(\d+)\s*Guests?\s*(\d+)\s*Room?/i', $guestsRaw, $matches);
    //     $guests = $matches[1] ?? 0;
    //     $rooms  = $matches[2] ?? 0;

    //     $availableRooms = Property::available($checkIn, $checkOut, $guests)
    //         ->whereHas('property', function ($q) use ($request) {
    //             if (!empty($request->location)) {
    //                 $q->where('address', 'LIKE', "%{$request->location}%");
    //             }
    //         })->get();

    //     $hotels = $availableRooms->groupBy('property_id')->map(function ($rooms, $hotelId) {
    //         return [
    //             'property_id' => $hotelId,
    //             'rooms' => $rooms
    //         ];
    //     });
    //     // return $hotels;
    //     return view('hotels.hotel_list', compact('hotels','data'));
    // }


    public function search_hotel(Request $request)
    {
        // return session('searchHotel');
        // return $request->all();

        $data = $request->only([
            'location',
            'date_range',
            'guests'
        ]);

        if ($request->clear_session == 1) {
            session()->pull('searchHotel');

            if (empty($data['location']) || empty($data['date_range']) || empty($data['guests'])) {
                $hotels = Property::with('city','property_image','minRoomPrice')
                    ->latest()
                    ->paginate(10);
                if(session()->has('searchHotel')){
                    $data = session('searchHotel');
                }else{
                    $data = "";
                }
                return view('hotels.hotel_list', compact('hotels','data'));
            }
        }

        $searchData = array("location" => $data["location"], "date_range" => $data["date_range"], "guests" => $data["guests"]);
        session(['searchHotel' => $searchData]);

        [$checkIn, $checkOut] = array_map('trim', explode('to', $data['date_range'] ?? ''));
        $guestsRaw = $data['guests'] ?? '';
        preg_match('/(\d+)\s*Guests?\s*(\d+)\s*Room?/i', $guestsRaw, $matches);
        $guests = $matches[1] ?? 0;
        $rooms  = $matches[2] ?? 0;

        $hotels = Property::available($checkIn, $checkOut, $guests)->when(!empty($data['location']), function ($q) use ($data) {
                $q->where(function($qq) use ($data) {
                    $qq->where('address', 'LIKE', "%{$data['location']}%");
                });
            })->with('city','property_image','minRoomPrice')->latest()->paginate(10);

        return view('hotels.hotel_list', compact('hotels','data'));
    }

    public function hotel_list()
    {
        $hotels = Property::where('featured', 1)->with('city','property_image','minRoomPrice')->latest()->paginate(10);
        return view('hotels.hotel_list', compact('hotels'));
    }

    public function property_detail($id)
    {
        $hotel = Property::with('city','property_image','minRoomPrice','amenities')->find($id);

        if(session()->has('searchHotel')){
            $data = session('searchHotel');
        }else{
            $data = "";
        }
        return view('hotels.property_detail', compact('hotel', 'data'));
    }

    public function room_detail($id)
    {   
        $hotel = Property::with('property_image')->find($id);
        $rooms = Room::where('property_id', $id)->with('property')->get();

        if(session()->has('searchHotel')){
            $data = session('searchHotel');
        }else{
            $data = "";
        }
        return view('rooms.room_detail', compact('hotel','rooms', 'data'));
    }

    // public function hotel_booking($id)
    // {
    //     $hotel = Property::with('city','property_image','minRoomPrice','amenities')->find($id);
    //     $room = Room::with('property')->find(2);

    //     if(session()->has('searchHotel')){
    //         $data = session('searchHotel');
    //     }else{
    //         $data = "";
    //     }
    //     return view('hotels.hotel_booking', compact('hotel', 'room', 'data'));
    // }

    
// My code
    public function hotel_booking(Request $request, $id)
    {
        // Fetch the Room and Hotel
        $room = Room::findOrFail($request->query('room_id'));
        $hotel = Property::findOrFail($id);

        //  Cast request inputs to Integers
        $nights = (int) $request->query('nights', 1);
        $guestsRaw = (int) $request->query('guests', 1);

        $basePrice = $room->price_per_night; 

        // Calculations ab sahi value pick karengi
        $totalPrice = $basePrice * $nights; 
        $discount = $totalPrice * 0.10; // 10% discount
        $priceAfterDiscount = $totalPrice - $discount;
        $serviceFee = 350; 

        $finalAmount = $priceAfterDiscount + $serviceFee;
        $days = $nights + 1;

        // Handle Dates
        $checkIn = $request->query('check_in', now()->format('d M'));
    
        $checkOut = $request->query('check_out', now()->addDays($nights)->format('d M'));

        //  Pass EVERYTHING to the view
        return view('hotels.hotel_booking', compact(
            'hotel', 'room', 'nights', 'days', 'guestsRaw', 
            'totalPrice', 'discount', 'priceAfterDiscount', 
            'finalAmount', 'checkIn', 'checkOut'
        ));
    }


    public function hotelBookingSuccess($order_id)
    {
        $payment = Payment::with('hotel.hotel_images')
                    ->where('razorpay_order_id', $order_id)
                    ->where('payable_type', 'hotel')
                    ->first();

        if (!$payment) {
            abort(404, "Payment not found.");
        }

        $hotel = $payment->hotel;
        $user = Auth::user();

        return view('hotels.hotel_bookingsuccess', compact('hotel', 'payment', 'user'));
    }
}


