<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Banner;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TourController extends Controller
{
    public function index() {
        $banner = Banner::where('type', 'Tour')->latest()->first();
        $tours = Tour::where('popular', 1)->with('tour_images')->latest()->get();
        $locations = Tour::select('location')->distinct()->orderBy('location', 'asc')->pluck('location');
        $categories = Category::all();
        return view('tours.index', compact('banner','tours','categories','locations'));
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
        $tour = Tour::with(['images','itineraries','inclusions','exclusions','policies'])->find($id);

        return view('tours.tour_detail', compact('tour'));
    }

    public function tour_booking($id)
    {
        $tour = Tour::with(['tour_images','itineraries','inclusions','exclusions','policies'])->find($id);
        if(!$tour){
            abort(404);
        }
        return view('tours.tour_booking', compact('tour'));
    }

    public function bookingSuccess($order_id)
    {
        $payment = Payment::with('tour_images')->where('razorpay_order_id', $order_id)->first();

        if (!$payment) {
            abort(404, "Payment not found.");
        }

        $tour = $payment->tour;
        $user = auth()->user();

        return view('tours.tour_bookingsuccess', compact('tour', 'payment', 'user'));
    }
}
