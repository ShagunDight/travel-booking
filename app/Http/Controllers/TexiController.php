<?php

namespace App\Http\Controllers;
use App\Models\TaxiInquiry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TexiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("texies.index");
    }

    public function texiInquery(Request $request)
    {   
        $data = $request->validate([ 
            'name'            => 'required|string|max:255', 
            'number'          => 'required|max:20', 
            'trip_type'       => 'required|in:one_way,round_trip', 
            'pickup'          => 'nullable|string|max:255', 
            'drop'            => 'nullable|string|max:255', 
            'pickupDate'      => 'nullable|string|max:50',
            'pickupTime'      => 'nullable|string|max:50', 
            'pickup_location' => 'nullable|string|max:255', 
            'drop_location'   => 'nullable|string|max:255', 
            'pickupDate2'     => 'nullable|string|max:50',
            'pickupTime2'     => 'nullable|string|max:50', 
            'return_date'     => 'nullable|string|max:50',
            'return_time'     => 'nullable|string|max:50', 
            'message'         => 'nullable|string', 
        ]);

        if($data['trip_type'] == "one_way") {
            $saveData = [
                'name'        => $data['name'],
                'number'      => $data['number'],
                'trip_type'   => $data['trip_type'],
                'pickup'      => $data['pickup'],
                'drop'        => $data['drop'],
                'pickup_date' => Carbon::parse($data['pickupDate'])->format('Y-m-d'),
                'pickup_time' => Carbon::parse($data['pickupTime'])->format('H:i:s'),
                'message'     => $data['message'],
            ];
        } else {
            $saveData = [
                'name'        => $data['name'],
                'number'      => $data['number'],
                'trip_type'   => $data['trip_type'],
                'pickup'      => $data['pickup_location'],
                'drop'        => $data['drop_location'],
                'pickup_date' => Carbon::parse($data['pickupDate2'])->format('Y-m-d'),
                'pickup_time' => Carbon::parse($data['pickupTime2'])->format('H:i:s'),
                'return_date' => Carbon::parse($data['return_date'])->format('Y-m-d'),
                'return_time' => Carbon::parse($data['return_time'])->format('H:i:s'),
                'message'     => $data['message'],
            ];
        }

        TaxiInquiry::create($saveData);

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
