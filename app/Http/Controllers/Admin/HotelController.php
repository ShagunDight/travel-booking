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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['featured'] = $request->has('featured') ? 1 : 0;

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/images/hotel'), $imageName);
            $data['image'] = '/images/hotel/'.$imageName;
        }

        $p = Property::create($data);

        if ($request->hasFile('gallery')) {
            foreach($request->file('gallery') as $galleryImg){
                $imageName = time().'_'.$galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('/images/hotel'), $imageName);

                Image::create([
                    'type'    => 1,
                    'type_id' => $p->id,
                    'url'     => '/images/hotel/'.$imageName,
                    'alt'     => $p->name,
                    'sort'    => 0,
                ]);
            }
        }

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
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['featured'] = $request->has('featured') ? 1 : 0;

        if ($request->hasFile('image')) {
            // delete old image
            if ($hotel->image && file_exists(public_path($hotel->image))) {
                unlink(public_path($hotel->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/images/hotel'), $imageName);

            $data['image'] = '/images/hotel/'.$imageName;
        }

        $hotel->update($data); 

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImg) {

                $imageName = time().'_'.$galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('/images/hotel'), $imageName);

                Image::create([
                    'type'    => 1,
                    'type_id' => $hotel->id,
                    'url'     => '/images/hotel/'.$imageName,
                    'alt'     => $hotel->name,
                    'sort'    => 0,
                ]);
            }
        }
        
        return redirect()->route('admin.hotels.index')->with('success','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $hotel)
    {
        if ($hotel->image && file_exists(public_path($hotel->image))) {
            unlink(public_path($hotel->image));
        }

        Image::where('type', 1)->where('type_id', $hotel->id)->delete();

        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success','Hotel deleted successfully');
    }
}
