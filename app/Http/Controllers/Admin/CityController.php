<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(10); 
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emojiList = ['🏛️','🏙️','🌆','🏖️','🎭','🕌','🏔️','🏰','🛕','🚤'];
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cities,name', 
            'state' => 'nullable|string|max:255', 
            'country' => 'nullable|string|max:255', 
            'emoji' => 'nullable|string|in:' . implode(',', $emojiList), // new emoji field
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images/cities'), $imageName);
            $data['image'] = '/images/cities/'.$imageName;
        }

        City::create($data);

        return redirect()->route('admin.cities.index')->with('success', 'City created successfully');
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
    public function edit(City $city)
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cities,name,'.$city->id,
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'emoji' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $imageName = time().'_'.$newImage->getClientOriginalName();
            $imagePath = '/images/cities/'.$imageName;

            if ($city->image && file_exists(public_path($city->image))) {
                unlink(public_path($city->image));
            }

            $newImage->move(public_path('images/cities'), $imageName);
            $data['image'] = $imagePath;
        }

        $city->update($data);

        return redirect()->route('admin.cities.index')->with('success','City updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete(); 
        return redirect()->route('admin.cities.index')->with('success','City deleted successfully');
    }
}
