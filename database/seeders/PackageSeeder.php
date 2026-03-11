<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package; 
use App\Models\Room; 
use App\Models\Tour;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = Room::take(5)->pluck('id')->toArray(); 
        $tours = Tour::take(5)->pluck('id')->toArray(); 
        $packagesData = [ 
            [ 
                'name' => 'Romantic Shimla Getaway', 
                'slug' => 'romantic-shimla-getaway', 
                'price' => 15000, 
                'description' => '3 nights in Shimla with deluxe hotel stay and guided city tour.', 
            ], 
            [ 
                'name' => 'Manali Adventure Package', 
                'slug' => 'manali-adventure-package', 
                'price' => 18000, 
                'description' => 'Includes hotel stay, river rafting, and Solang Valley excursion.', 
            ], 
            [ 
                'name' => 'Golden Triangle Tour', 
                'slug' => 'golden-triangle-tour', 
                'price' => 25000, 
                'description' => 'Delhi, Agra, Jaipur with hotel stays and sightseeing tours.', 
            ], 
            [ 
                'name' => 'Goa Beach Holiday', 
                'slug' => 'goa-beach-holiday', 
                'price' => 20000, 
                'description' => '4 nights in Goa with beachside hotel and North/South Goa tours.', 
            ], 
            [ 
                'name' => 'Kerala Backwaters Retreat', 
                'slug' => 'kerala-backwaters-retreat', 
                'price' => 22000, 
                'description' => 'Houseboat stay in Alleppey with Munnar and Kochi sightseeing.', 
            ], 
        ]; 
        
        foreach ($packagesData as $data) { 
            $package = Package::create($data); 
            // Attach random rooms and tours 
            $package->rooms()->sync(array_slice($rooms, 0, rand(1,3))); 
            $package->tours()->sync(array_slice($tours, 0, rand(1,3))); 
        }
    }
}
