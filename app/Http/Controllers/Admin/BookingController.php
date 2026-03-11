<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Package;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('user','bookable')->paginate(10); 
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'user_id' => 'required|exists:users,id', 
            'bookable_type' => 'required|string|in:App\Models\Room,App\Models\Tour,App\Models\Package', 
            'bookable_id' => 'required|integer', 
            'guests' => 'required|integer|min:1', 
            'amount' => 'required|numeric|min:0', 
            'status' => 'required|string|in:pending,confirmed,cancelled', 
            'check_in' => 'nullable|date', 
            'check_out' => 'nullable|date', 
            'booking_date' => 'nullable|date', 
        ]); 
        
        Booking::create($data);
        return redirect()->route('admin.bookings.index')->with('success','Booking created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $booking->load('user','bookable'); 
        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([ 
            'user_id' => 'required|exists:users,id', 
            'bookable_type' => 'required|string|in:App\Models\Room,App\Models\Tour,App\Models\Package', 
            'bookable_id' => 'required|integer', 
            'guests' => 'required|integer|min:1', 
            'amount' => 'required|numeric|min:0', 
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'check_in' => 'nullable|date', 
            'check_out' => 'nullable|date', 
            'booking_date' => 'nullable|date', 
        ]); 
        
        $booking->update($data);
        return redirect()->route('admin.bookings.index')->with('success','Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete(); 
        return redirect()->route('admin.bookings.index')->with('success','Booking deleted successfully');
    }

    public function getBookableItems(Request $request)
    {
        $type = $request->input('type'); // POST input
        $items = [];

        if($type && class_exists($type)) {
            $items = $type::select('id', 'name')->get();
        }

        return response()->json($items);
    }

}
