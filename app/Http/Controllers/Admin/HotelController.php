<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property; 
use App\Models\City;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Property::with('rooms','city')->paginate(10); 
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all(); 
        return view('admin.hotels.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'slug' => 'required|unique:properties', 
            'city_id' => 'required|exists:cities,id', 
            'address' => 'nullable|string', 
            'about' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $data['featured'] = $request->has('featured') ? 1 : 0;
        Property::create($data);
        return redirect()->route('admin.hotels.index')->with('success','Hotel created successfully');
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
    public function edit(Property $hotel)
    {
        $cities = City::all(); 
        return view('admin.hotels.edit', compact('hotel','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $hotel)
    {
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'slug' => 'required|unique:properties,slug,'.$hotel->id, 
            'city_id' => 'required|exists:cities,id', 
            'address' => 'nullable|string', 
            'about' => 'nullable|string',
            'featured' => 'nullable|boolean', 
        ]);

        $data['featured'] = $request->has('featured') ? 1 : 0;
        $hotel->update($data); 
        return redirect()->route('admin.hotels.index')->with('success','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $hotel)
    {
        $hotel->delete(); 
        return redirect()->route('admin.hotels.index')->with('success','Hotel deleted successfully');
    }
}
