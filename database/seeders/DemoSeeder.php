<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Property;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\Image;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = City::firstOrCreate([
            'name'=>'Los Angeles',
            'country'=>'USA'
        ]); 
        
        $property = Property::create([ 
            'city_id'=>$city->id, 
            'name'=>'Courtyard by Marriott New York', 
            'slug'=>'courtyard-marriott-new-york', 
            'address'=>'5555 W Century Blvd, Los Angeles - 90045', 
            'about'=>'Near airport, ideal for business travelers. High cleanliness standards.', 
            'policies'=>[ 
                'check_in'=>'15:00-17:00', 
                'check_out'=>'10:00-11:00', 
                'pets'=>false, 
                'smoking'=>false, 
                'quiet_hours'=>'22:00-06:00' 
            ], 
        ]); 
        
        $amenities = collect([ 
            ['name'=>'Gym','type'=>'activity'], 
            ['name'=>'Spa','type'=>'activity'], 
            ['name'=>'Cycling','type'=>'activity'], 
            ['name'=>'Room Service','type'=>'service'], 
            ['name'=>'Dry Cleaning','type'=>'service'], 
            ['name'=>'Concierge Service','type'=>'service'], 
            ['name'=>'Laundry Service','type'=>'service'], 
            ['name'=>'Meeting/Banquet Facilities','type'=>'service'], 
            ['name'=>'Credit Card','type'=>'payment'], 
            ['name'=>'Master Card','type'=>'payment'], 
            ['name'=>'Doctor on Call','type'=>'security'], 
            ['name'=>'English','type'=>'language'], 
            ['name'=>'Spanish','type'=>'language'], 
            ['name'=>'Hindi','type'=>'language'], 
        ])->map(fn($a)=>Amenity::firstOrCreate($a)); 
        
        $property->amenities()->sync($amenities->pluck('id')); 
            
        Room::create([ 
            'property_id'=>$property->id, 
            'name'=>'Luxury Room with Balcony', 
            'capacity'=>2, 'price_per_night'=>750, 
            'refundable'=>true, 
            'free_cancel_until'=>now()->addDays(30), 
            'features'=>[
                'Air Conditioning',
                'Wi-Fi',
                'Kitchen'
            ], 
        ]); 
        
        Room::create([ 
            'property_id'=>$property->id, 
            'name'=>'Deluxe Pool View with Breakfast', 
            'capacity'=>2, 
            'price_per_night'=>750, 
            'refundable'=>false, 
            'features'=>[
                'Air Conditioning',
                'Wi-Fi',
                'Kitchen'
            ], 
        ]); 
        
        Image::insert([ 
            ['property_id'=>$property->id,'url'=>'https://picsum.photos/800/500?1','alt'=>'Exterior','sort'=>1], 
            ['property_id'=>$property->id,'url'=>'https://picsum.photos/800/500?2','alt'=>'Pool','sort'=>2], 
            ['property_id'=>$property->id,'url'=>'https://picsum.photos/800/500?3','alt'=>'Room','sort'=>3], 
            ['property_id'=>$property->id,'url'=>'https://picsum.photos/800/500?4','alt'=>'Lounge','sort'=>4], 
        ]);
    }
}
