<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class AdminPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('city')->paginate(20); 
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all(); 
        return view('admin.properties.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'name'=>'required', 
            'slug'=>'required|unique:properties', 
            'city_id'=>'required|exists:cities,id', 
            'address'=>'nullable', 
            'about'=>'nullable', 
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]); 
        
        $p = Property::create($data);

        return redirect()->route('admin.properties.index')->with('success','Property created');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = $request->validate([
            'name'    => 'required',
            'slug'    => 'required|unique:properties,slug,' . $property->id,
            'city_id' => 'required|exists:cities,id',
            'address' => 'nullable',
            'about'   => 'nullable',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($property->image && file_exists(public_path($property->image))) {
                unlink(public_path($property->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/images/hotel'), $imageName);

            $data['image'] = '/images/hotel/'.$imageName;
        }

        $property->update($data);

        // update image table
        if ($request->hasFile('image')) {

            $image = Image::where('type',1)->where('type_id',$property->id)->first();

            if ($image) {
                $image->update([
                    'url' => '/images/hotel/'.$imageName,
                    'alt' => $property->name,
                ]);
            } else {
                Image::create([
                    'type'    => 1,
                    'type_id' => $property->id,
                    'url'     => '/images/hotel/'.$imageName,
                    'alt'     => $property->name,
                    'sort'    => 0,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success','Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
