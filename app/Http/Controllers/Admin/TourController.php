<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Property;
use App\Models\Image;
use App\Models\Itinerary;
use App\Models\Inclusion;
use App\Models\Exclusion;
use App\Models\Policy;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with(['itineraries','tour_images','inclusions','exclusions','policies','stops'])->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $hotels = Property::all();
        return view('admin.tours.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'capmping' => 'required|in:1,2',
            'slug' => 'required|unique:tours', 
            'starting_location' => 'required|string|max:255', 
            'location' => 'required|string|max:255', 
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:255', 
            'description' => 'nullable|string', 
            'features' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'policy'     => 'nullable|array',
            'itinerary' => 'nullable|array',
            // 'stops'=>'required|array|min:1',
            // 'stops.*.location'=>'required|string',
        ]); 
        
        $tour = Tour::create($data);

        // Image
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/images/tours'), $imageName);

            $tour->tour_images()->create([
                'type'    => 3,
                'url'     => '/images/tours/'.$imageName,
                'alt'     => $tour->name,
                'sort'    => 0,
            ]);
        }

        // Itineraries
        if (!empty($request->itinerary)) { 
            foreach ($request->itinerary as $day => $dayData) { 
                $tour->itineraries()->create([ 
                    'day' => $day, 
                    'title' => $dayData['title'] ?? "Day $day", 
                    'description'=> $dayData['description'] ?? null, 
                ]); 
            } 
        }
         
        // Inclusions
        if (!empty($data['inclusions'])) { 
            foreach ($data['inclusions'] as $text) { 
                $tour->inclusions()->create([
                    'text'=>$text
                ]); 
            } 
        } 
        
        // Exclusions
        if (!empty($data['exclusions'])) { 
            foreach ($data['exclusions'] as $text) { 
                $tour->exclusions()->create([
                    'text'=>$text
                ]); 
            } 
        } 
        
        // Policy
        if (!empty($data['policy'])) { 
            $tour->policies()->create([ 
                'cancellation' => $data['policy']['cancellation'] ?? null, 
                'refund' => $data['policy']['refund'] ?? null, 
            ]); 
        }

        // Stops
        // foreach($request->stops as $day => $stop){
        //     $tour->stops()->create([
        //         'day_number'=>$day,
        //         'location'=>$stop['location'],
        //         'hotel_id'=>$stop['hotel_id'] ?? null,
        //         'description'=>$stop['description'] ?? null,
        //     ]);
        // }

        return redirect()->route('admin.tours.index')->with('success','Tour created successfully');
    }

    public function edit(Tour $tour)
    {
        $hotels = Property::all();
        $tour->load(['stops']);
        return view('admin.tours.edit', compact('tour','hotels'));
    }

    public function update(Request $request, Tour $tour)
    {
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'capmping' => 'required|in:1,2',
            'slug' => 'required|unique:tours,slug,'.$tour->id, 
            'starting_location' => 'required|string|max:255', 
            'location' => 'required|string|max:255', 
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:255',
            'description' => 'nullable|string', 
            'features' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'inclusions' => 'nullable|array', 
            'exclusions' => 'nullable|array', 
            'policy' => 'nullable|array', 
            'itinerary' => 'nullable|array',
            // 'stops'=>'required|array|min:1',
            // 'stops.*.location'=>'required|string',
        ]);

        $tour->update($data);

        // Image
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $imageName = time().'_'.$newImage->getClientOriginalName();
            $imagePath = '/images/tours/'.$imageName;

            $oldImage = $tour->tour_images;
            if ($oldImage) {
                $oldFile = public_path($oldImage->url);
                if (file_exists($oldFile)) unlink($oldFile);
                $oldImage->delete();
            }

            $newImage->move(public_path('/images/tours'), $imageName);
            $tour->tour_images()->create([
                'type'=>3,
                'url'=>$imagePath,
                'alt'=>$tour->name,
                'sort'=>0,
            ]);
        }

        // Itineraries
        if (!empty($request->itinerary)) {
            $tour->itineraries()->delete();
            foreach ($request->itinerary as $day => $dayData) { 
                $tour->itineraries()->create([ 
                    'day' => $day, 
                    'title' => $dayData['title'] ?? "Day $day", 
                    'description'=> $dayData['description'] ?? null, 
                ]); 
            } 
        }

        // Inclusions
        $tour->inclusions()->delete();
        if (!empty($request->inclusions)) {
            foreach ($request->inclusions as $text) { 
                $tour->inclusions()->create([
                    'text'=>$text
                ]); 
            } 
        }

        // Exclusions
        $tour->exclusions()->delete();
        if (!empty($request->exclusions)) {
            foreach ($request->exclusions as $text) { 
                $tour->exclusions()->create([
                    'text'=>$text
                ]); 
            } 
        }

        // Policy
        $tour->policies()->delete();
        if (!empty($request->policy)) { 
            $tour->policies()->create([ 
                'cancellation' => $request->policy['cancellation'] ?? null, 
                'refund' => $request->policy['refund'] ?? null, 
            ]); 
        }

        // Stops
        // $tour->stops()->delete();
        // foreach($request->stops as $day => $stop){
        //     $tour->stops()->create([
        //         'day_number'=>$day,
        //         'location'=>$stop['location'],
        //         'hotel_id'=>$stop['hotel_id'] ?? null,
        //         'description'=>$stop['description'] ?? null,
        //     ]);
        // }

        return redirect()->route('admin.tours.index')->with('success','Tour updated successfully');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success','Tour deleted successfully');
    }
}
