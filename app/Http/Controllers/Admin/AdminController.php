<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Room;
use App\Models\Tour;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Review;
use App\Models\City;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function dashboard() {
        return view('dashboard', [
            'properties_count'   => Property::count(),
            'rooms_count'        => Room::count(),
            'tours_count'        => Tour::count(),
            'packages_count'     => Package::count(),
            'bookings_count'     => Booking::count(),
            'reviews_count'      => Review::count(),
            'cities_count'       => City::count(),
            'users_count'        => User::count(),
            'roles_count'        => Role::count(),
            'permissions_count'  => Permission::count(),
        ]);
    }
}
