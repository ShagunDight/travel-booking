<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        $hotels = Property::where('featured', 1)->with('city','property_image','minRoomPrice')->latest()->paginate(4);
        return view('hotels.index', compact('hotels'));
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

    public function hotel_booking($id)
    {
        $hotel = Property::with('city','property_image','minRoomPrice','amenities')->find($id);
        $room = Room::with('property')->find(2);

        if(session()->has('searchHotel')){
            $data = session('searchHotel');
        }else{
            $data = "";
        }
        return view('hotels.hotel_booking', compact('hotel', 'room', 'data'));
    }
}


