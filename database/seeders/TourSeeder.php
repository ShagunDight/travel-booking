<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::create([ 
            'name' => 'Golden Temple Visit', 
            'slug' => 'golden-temple-visit', 
            'location' => 'Amritsar', 
            'price' => 1500, 
            'description' => 'Guided tour of Golden Temple with local food experience.', 
        ]); 
        
        Tour::create([ 
            'name' => 'Shimla Hills Adventure', 
            'slug' => 'shimla-hills-adventure', 
            'location' => 'Shimla', 
            'price' => 2500, 
            'description' => '2-day adventure tour with trekking and camping.', 
        ]); 
        
        Tour::create([ 
            'name' => 'Jaipur Heritage Walk', 
            'slug' => 'jaipur-heritage-walk', 
            'location' => 'Jaipur', 
            'price' => 2000, 
            'description' => 'Explore forts, palaces, and local markets of Jaipur.', 
        ]);
    }
}
