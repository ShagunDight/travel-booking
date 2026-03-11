<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TourController extends Controller
{
    public function index() {
        $tours = Tour::with('tour_images')->get();
        $locations = Tour::select('location')->distinct()->orderBy('location', 'asc')->pluck('location');
        $categories = Category::all();
        return view('tours.index', compact('tours','categories','locations'));
    }
    
    // public function show($slug) { 
    //     return view('tours.show', compact('slug')); 
    // }

    public function search_tour(Request $request)
    {
        $data = $request->validate([
            'location' => 'nullable|string|max:255',
            'date'     => 'nullable|string|max:50',
            'capmping' => 'nullable|string|max:255',
        ]);

        $locations = Tour::select('location')->distinct()->orderBy('location', 'asc')->pluck('location');
        $tours = Tour::with('tour_images')
            ->when(!empty($data['location']), function ($q) use ($data) {
                $q->where('location', 'LIKE', "%{$data['location']}%");
                $q->where('capmping', 'LIKE', "%{$data['capmping']}%");
            })->latest()->paginate(10);

        $searchData = array("location" => $data["location"], "date" => $data["date"], "capmping" => $data["capmping"]);
        session(['searchTour' => $searchData]);

        return view('tours.tour_list', compact('locations','tours','data'));
    }


    public function tour_detail($id)
    {
        $tour = Tour::with(['tour_images','itineraries','inclusions','exclusions','policies'])->find($id);
        return view('tours.tour_detail', compact('tour'));
    }

    public function tour_booking($id)
    {
        $tour = Tour::with(['tour_images','itineraries','inclusions','exclusions','policies'])->find($id);
        return view('tours.tour_booking', compact('tour'));
    }
}
