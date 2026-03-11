<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking; 
use App\Models\User; 
use App\Models\Room; 
use App\Models\Tour; 
use App\Models\Package;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(2); 
        // assume at least one user exists

        // Room Booking 
        $room = Room::inRandomOrder()->first(); 
        Booking::create([ 
            'user_id' => $user->id, 
            'bookable_id' => $room->id, 
            'bookable_type' => Room::class, 
            'check_in' => now()->addDays(3)->toDateString(), 
            'check_out' => now()->addDays(6)->toDateString(), 
            'guests' => 2, 
            'amount' => 4500, 
            'status' => 'pending', 
        ]);

        // Tour Booking 
        $tour = Tour::inRandomOrder()->first(); 
        Booking::create([ 
            'user_id' => $user->id, 
            'bookable_id' => $tour->id, 
            'bookable_type' => Tour::class, 
            'booking_date' => now()->addDays(10)->toDateString(), 
            'guests' => 4, 
            'amount' => 8000, 
            'status' => 'confirmed', 
        ]);

        // Package Booking 
        $package = Package::inRandomOrder()->first(); 
        Booking::create([ 
            'user_id' => $user->id, 
            'bookable_id' => $package->id, 
            'bookable_type' => Package::class, 
            'booking_date' => now()->addDays(15)->toDateString(), 
            'guests' => 3, 
            'amount' => 12000, 
            'status' => 'pending', 
            'meta' => json_encode(['notes' => 'Includes airport pickup']), 
        ]);

        // Add 2 more random bookings 
        for ($i=0; $i<2; $i++) {
            $type = [Room::class, Tour::class, Package::class][array_rand([0,1,2])]; 
            $bookable = $type::inRandomOrder()->first();

            Booking::create([ 
                'user_id' => $user->id, 
                'bookable_id' => $bookable->id, 
                'bookable_type' => $type, 
                'booking_date' => now()->addDays(rand(5,20))->toDateString(), 
                'guests' => rand(1,5), 
                'amount' => rand(5000,15000), 
                'status' => ['pending','confirmed','cancelled'][rand(0,2)], 
            ]);
        }
    }
}
