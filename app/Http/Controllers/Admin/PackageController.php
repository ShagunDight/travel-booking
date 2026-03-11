<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package; 
use App\Models\Room; 
use App\Models\Tour;
use App\Models\Image;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::with(['rooms','tours','images'])->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all(); 
        $tours = Tour::all(); 
        return view('admin.packages.create', compact('rooms','tours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:1,2,3',
            'capmping' => 'required|in:1,2',
            'slug' => 'required|string|unique:packages,slug',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'rooms' => 'nullable|array',
            'tours' => 'nullable|array',
            'popular' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['popular'] = $request->has('popular') ? 1 : 0;

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/images/packages'), $imageName);
            $data['image'] = '/images/packages/'.$imageName;
        }

        $package = Package::create($data);

        if ($type == 1) {
            $package->rooms()->sync($data['rooms'] ?? []);
        } elseif ($type == 2) {
            $package->tours()->sync($data['tours'] ?? []);
        }

        if ($request->hasFile('gallery')) {
            foreach($request->file('gallery') as $galleryImg){
                $imageName = time().'_'.$galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('/images/packages'), $imageName);

                Image::create([
                    'type'    => 2,
                    'type_id' => $package->id,
                    'url'     => '/images/packages/'.$imageName,
                    'alt'     => $package->name,
                    'sort'    => 0,
                ]);
            }
        }
        return redirect()->route('admin.packages.index')->with('success','Package created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $rooms = Room::all();
        $tours = Tour::all();
        $package->load(['rooms','tours','images']);
        // return $package;
        return view('admin.packages.edit', compact('package','rooms','tours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:1,2,3',
            'capmping' => 'required|in:1,2',
            'slug' => 'required|string|unique:packages,slug,'.$package->id,
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'rooms' => 'nullable|array',
            'tours' => 'nullable|array',
            'popular' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['popular'] = $request->has('popular') ? 1 : 0;

        if ($request->hasFile('image')) {

            if ($package->image && file_exists(public_path($package->image))) {
                unlink(public_path($package->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/images/packages'), $imageName);
            $data['image'] = '/images/packages/'.$imageName;
        }

        $package->update($data);

        $package->rooms()->sync($data['rooms'] ?? []);
        $package->tours()->sync($data['tours'] ?? []);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImg) {

                $imageName = time().'_'.$galleryImg->getClientOriginalName();
                $galleryImg->move(public_path('/images/packages'), $imageName);

                Image::create([
                    'type'    => 2,
                    'type_id' => $package->id,
                    'url'     => '/images/packages/'.$imageName,
                    'alt'     => $package->name,
                    'sort'    => 0,
                ]);
            }
        }

        return redirect()->route('admin.packages.index')
            ->with('success','Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success','Package deleted successfully');
    }

    public function deleteGallery($id)
    {
        $image = Image::findOrFail($id);

        if (file_exists(public_path($image->url))) {
            unlink(public_path($image->url));
        }

        $image->delete();

        return back()->with('success', 'Gallery image deleted');
    }

}
