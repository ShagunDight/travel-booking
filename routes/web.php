<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Admin\HotelController; 
use App\Http\Controllers\Admin\RoomController; 
use App\Http\Controllers\Admin\TourController; 
use App\Http\Controllers\Admin\PackageController; 
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TaxiInquiryController;
use App\Http\Controllers\PaymentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/hotels', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotels.index');
Route::match(['get','post'], '/hotels/search-hotel', [\App\Http\Controllers\HotelController::class, 'search_hotel'])->name('hotel.search');
Route::get('/hotels/hotel-list', [\App\Http\Controllers\HotelController::class, 'hotel_list'])->name('hotels.hotel_list');
Route::get('/hotels/property-detail/{id}', [\App\Http\Controllers\HotelController::class, 'property_detail'])->name('hotels.property_detail');
Route::get('/hotels/room-detail/{id}', [\App\Http\Controllers\HotelController::class, 'room_detail'])->name('hotels.room_detail');
Route::get('/hotels/hotel-booking/{id}', [\App\Http\Controllers\HotelController::class, 'hotel_booking'])->name('hotels.hotel_booking');

Route::get('/tours', [\App\Http\Controllers\TourController::class, 'index'])->name('tours.index');
Route::match(['get','post'], '/tours/search-tour', [\App\Http\Controllers\TourController::class, 'search_tour'])->name('tour.search');
Route::get('/tours/tour-detail/{id}', [\App\Http\Controllers\TourController::class, 'tour_detail'])->name('tours.tour_detail');
Route::get('/tours/tour-booking/{id}', [\App\Http\Controllers\TourController::class, 'tour_booking'])->name('tours.tour_booking');

Route::get('/texi', [\App\Http\Controllers\TexiController::class, 'index'])->name('texi.index');
Route::post('/texi/inquery', [\App\Http\Controllers\TexiController::class, 'texiInquery'])->name('taxi.texi_inquery');

Route::get('/about-us', [\App\Http\Controllers\HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [\App\Http\Controllers\HomeController::class, 'contactUs'])->name('contactUs');
Route::get('/privacy-policy', [\App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms', [\App\Http\Controllers\HomeController::class, 'terms'])->name('terms');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-profile', [\App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');
    Route::post('/update-profile', [\App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/my-booking', [\App\Http\Controllers\HomeController::class, 'mybooking'])->name('mybooking');
});

Route::middleware(['auth','is_admin'])->prefix('admin')->as('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('properties', AdminPropertyController::class);
    Route::resource('reviews', AdminReviewController::class);
    Route::resource('hotels', HotelController::class); 
    Route::resource('rooms', RoomController::class); 
    Route::resource('tours', TourController::class); 
    Route::resource('packages', PackageController::class); 
    Route::resource('bookings', BookingController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('cities', CityController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('taxi', TaxiInquiryController::class);

    Route::post('bookings/items', [BookingController::class, 'getBookableItems'])->name('bookings.items');
    Route::get('packages/gallery/delete/{id}', [PackageController::class, 'deleteGallery'])->name('packages.deleteGallery');
});

//  my code

// TOUR
// Route::get('/tour-booking/{id}', [TourController::class,'tour_booking'])->name('tour.booking');

Route::get('/tour-booking-success/{order_id}', [\App\Http\Controllers\TourController::class,'bookingSuccess'])
->name('tour.booking.success');

// Hotel

Route::get('/hotel-booking-success/{order_id}', [\App\Http\Controllers\HotelController::class, 'hotelBookingSuccess'])
->name('hotel.booking.success');


// Payment
Route::post('/create-order',[PaymentController::class,'createOrder'])->name('create.order');

Route::post('/verify-payment',[PaymentController::class,'verifyPayment'])->name('verify.payment');

require __DIR__.'/auth.php';
