<?php

namespace App\Http\Controllers;
use App\Models\Package; 
use App\Models\Category; 
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Review;
use App\Models\Tour;
use App\Models\Property;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            'banners' => Banner::where('type', 'Home')->get(),
            'packages' => Tour::where('popular', 1)->with('tour_images')->latest()->take(8)->get(),
            'hotels' => Property::where('featured', 1)->latest()->take(6)->get(),
            'indianDestinations' => City::where('country', 'IN')->take(12)->get(),
            'internationalDestinations' => City::where('country', '!=', 'IN')->take(4)->get(),
            'locations' => Tour::select('location')->distinct()->orderBy('location', 'asc')->pluck('location'),
        ]);
    }

    public function myprofile()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $countries = Country::all();
        return view('settings.myprofile', compact('user','countries'));
    }

    public function mybooking()
    {
        return view('settings.mybooking');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user(); 
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email,'.$user->id, 
            'mobile' => 'nullable|string|max:255', 
            'nationality' => 'nullable|string|max:255', 
            'dob' => 'nullable|date', 
            'gender' => 'nullable|in:Male,Female,Other', 
            'address' => 'nullable|string|max:255', 
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]); 
        
        if ($request->hasFile('image')) { 
            if ($user->image && file_exists(public_path($user->image))) { 
                unlink(public_path($user->image)); 
            }
            $imageName = time().'_'.$request->file('image')->getClientOriginalName(); 
            $request->file('image')->move(public_path('images/profile'), $imageName); 
            $data['image'] = '/images/profile/'.$imageName; 
        }
        $user->update($data);

        return redirect()->back()->with('success','Profile updated successfully');
    }

    public function aboutUs()
    {
        return view('pages.about_us');
    }

    public function contactUs()
    {
        return view('pages.contact_us');
    }

    public function privacyPolicy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

}
