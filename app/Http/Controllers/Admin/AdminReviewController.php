<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review; 
use App\Models\User; 
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with(['user','booking'])->paginate(10); 
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); 
        $bookings = Booking::all(); 
        return view('admin.reviews.create', compact('users','bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'user_id' => 'required|exists:users,id', 
            'booking_id' => 'required|exists:bookings,id', 
            'rating' => 'required|integer|min:1|max:5', 
            'comment' => 'nullable|string', 
        ]); 
        
        Review::create($data); 
        return redirect()->route('admin.reviews.index')->with('success','Review created successfully');
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
    public function edit(Review $review)
    {
        $users = User::all(); 
        $bookings = Booking::all(); 
        return view('admin.reviews.edit', compact('review','users','bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $data = $request->validate([ 
            'user_id' => 'required|exists:users,id', 
            'booking_id' => 'required|exists:bookings,id', 
            'rating' => 'required|integer|min:1|max:5', 
            'comment' => 'nullable|string', 
        ]); 
        
        $review->update($data);
        return redirect()->route('admin.reviews.index')->with('success','Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete(); 
        return redirect()->route('admin.reviews.index')->with('success','Review deleted successfully');
    }
}
