<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleCheckin;

class VehicleCheckinController extends Controller
{
  
    
    public function index(Request $request)
    {
        // Get search query from request
        $search = $request->input('search');
    
        // Only perform search if the search term is at least 2 characters long
        if ($search && strlen($search) > 1) {
            // Query the database and apply filters
            $checkins = VehicleCheckin::when($search, function ($query, $search) {
                return $query->where('customer_name', 'like', '%' . $search . '%')
                             ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%')
                             ->orWhere('make_model', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc') // Order by created_at for new data at the top
            ->paginate(5); // Pagination (5 items per page)
        } else {
            // If search term is too short, just get all records (or can display a message to user)
            $checkins = VehicleCheckin::orderBy('created_at', 'desc')
                                      ->paginate(10); // Pagination (5 items per page)
        }
    
        return view('vehicle-checkin.index', compact('checkins', 'search'));
    }
    
    public function dashboard()
    {
        $checkins = VehicleCheckin::all();
        return view('dashboards.dashboard');
    }

    public function create()
    {
        return view('vehicle-checkin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'vehicle_registration_number' => 'required|string|max:20',
            'make_model' => 'required|string|max:255',
            'year_of_manufacture' => 'required|integer|min:1900|max:' . date('Y'),
            'chassis_number' => 'nullable|string|max:255',
            'battery_number' => 'nullable|string|max:255',
             'car_tire' => 'nullable|string|max:255',
            'engine_number' => 'nullable|string|max:255',
            'fuel_type' => 'required|in:Petrol,Diesel,CNG,Electric',
            'odometer_reading' => 'required|integer|min:0',
            'service_type' => 'required|in:General Service,Accidental Repair,Periodic Maintenance,Custom Work',
            'additional_notes' => 'nullable|string',
            'car_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'arrival_datetime' => 'required|date',
            'pickup_dropoff_mode' => 'required|in:Self-drop,Pickup Service',
        ]);

        // if ($request->hasFile('car_images')) {
        //     foreach ($request->file('car_images') as $image) {
        //         // Generate a unique name for the image
        //         $imageName = time() . '_' . $image->getClientOriginalName();
        
        //         // Move the image to the public/images directory
        //         $image->move(public_path('images'), $imageName);
        
        //         // Add the image path to the array
        //         $imagePaths[] = 'images/' . $imageName;
        //     }
        // }
        
    // Process the images if any
    $imagePaths = [];  // Initialize an empty array to store image paths
    
    if ($request->hasFile('car_images')) {
        foreach ($request->file('car_images') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . $image->getClientOriginalName();
    
            // Move the image to the public/images directory
            $image->move(public_path('images'), $imageName);
    
            // Add the image path to the array
            $imagePaths[] = 'images/' . $imageName;
        }
    }
        
        
        VehicleCheckin::create([
            'customer_name' => $request->customer_name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'address' => $request->address,
            'vehicle_registration_number' => $request->vehicle_registration_number,
            'make_model' => $request->make_model,
            'year_of_manufacture' => $request->year_of_manufacture,
            'chassis_number' => 'nullable|string|max:255',
            // 'chassis_number' => $request->chassis_number,
            // 'engine_number' => $request->engine_number,
            'engine_number' => 'nullable|string|max:255',
            'battery_number' => $request->battery_number,
            'car_tire' => $request->car_tire,
            'fuel_type' => $request->fuel_type,
            'odometer_reading' => $request->odometer_reading,
            'service_type' => $request->service_type,
            'additional_notes' => $request->additional_notes,
            'car_images' => implode(',', $imagePaths),
            
            'arrival_datetime' => $request->arrival_datetime,
            'pickup_dropoff_mode' => $request->pickup_dropoff_mode,
        ]);

        return redirect()->route('job-cards.create')->with('success', 'Vehicle check-in successful!');
    }

    public function show($id)
    {
        $checkin = VehicleCheckin::findOrFail($id);
        return view('vehicle-checkin.show', compact('checkin'));
    }

    public function edit($id)
    {
        $checkin = VehicleCheckin::findOrFail($id);
        return view('vehicle-checkin.edit', compact('checkin'));
    }
    
public function update(Request $request, $id)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'contact_number' => 'required|string|max:15',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string',
        'vehicle_registration_number' => 'required|string|max:20',
        'make_model' => 'required|string|max:255',
        'year_of_manufacture' => 'required|integer|min:1900|max:' . date('Y'),
        'chassis_number' => 'nullable|string|max:255',
        'engine_number' => 'nullable|string|max:255',
        'battery_number' => 'nullable|string|max:255',
        'car_tire' => 'nullable|string|max:255',
        'fuel_type' => 'required|in:Petrol,Diesel,CNG,Electric',
        'odometer_reading' => 'required|integer|min:0',
        'service_type' => 'required|in:General Service,Accidental Repair,Periodic Maintenance,Custom Work',
        'additional_notes' => 'nullable|string',
        'car_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'arrival_datetime' => 'required|date',
        'pickup_dropoff_mode' => 'required|in:Self-drop,Pickup Service',
    ]);

    $checkin = VehicleCheckin::findOrFail($id);

    // Get existing images from the database
    $existingImages = explode(',', $checkin->car_images);
    $imagePaths = $existingImages; // Initialize the image paths with existing images

    // Handle new image uploads
    if ($request->hasFile('car_images')) {
        foreach ($request->file('car_images') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Move the image to the public/images directory
            $image->move(public_path('images'), $imageName);
            // Add the new image path to the array
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Update the checkin data
    $checkin->update([
        'customer_name' => $request->customer_name,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'address' => $request->address,
        'vehicle_registration_number' => $request->vehicle_registration_number,
        'make_model' => $request->make_model,
        'year_of_manufacture' => $request->year_of_manufacture,
        'chassis_number' => 'nullable|string|max:255',
        'engine_number' => 'nullable|string|max:255',
        'fuel_type' => $request->fuel_type,
        'odometer_reading' => $request->odometer_reading,
        'service_type' => $request->service_type,
        'additional_notes' => $request->additional_notes,
        'car_images' => implode(',', $imagePaths), // Save both old and new image paths
        'arrival_datetime' => $request->arrival_datetime,
        'pickup_dropoff_mode' => $request->pickup_dropoff_mode,
        'battery_number' => $request->battery_number,
        'car_tire' => $request->car_tire
    ]);

    return redirect()->route('vehicle-checkin.index')->with('success', 'Vehicle check-in updated successfully!');
}

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'customer_name' => 'required|string|max:255',
    //         'contact_number' => 'required|string|max:15',
    //         'email' => 'nullable|email|max:255',
    //         'address' => 'nullable|string',
    //         'vehicle_registration_number' => 'required|string|max:20',
    //         'make_model' => 'required|string|max:255',
    //         'year_of_manufacture' => 'required|integer|min:1900|max:' . date('Y'),
    //         'chassis_number' => 'nullable|string|max:255',
    //         // 'engine_number' => 'required|string|max:255',
    //         'engine_number' => 'nullable|string|max:255',

    //         'fuel_type' => 'required|in:Petrol,Diesel,CNG,Electric',
    //         'odometer_reading' => 'required|integer|min:0',
    //         'service_type' => 'required|in:General Service,Accidental Repair,Periodic Maintenance,Custom Work',
    //         'additional_notes' => 'nullable|string',
    //         'car_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'arrival_datetime' => 'required|date',
    //         'pickup_dropoff_mode' => 'required|in:Self-drop,Pickup Service',
    //     ]);

    //     $checkin = VehicleCheckin::findOrFail($id);

    //     // Handling Image Upload
    //     if ($request->hasFile('car_images')) {
    //         foreach ($request->file('car_images') as $image) {
    //             // Generate a unique name for the image
    //             $imageName = time() . '_' . $image->getClientOriginalName();
        
    //             // Move the image to the public/images directory
    //             $image->move(public_path('images'), $imageName);
        
    //             // Add the image path to the array
    //             $imagePaths[] = 'images/' . $imageName;
    //         }
    //     }

    //     $checkin->update([
    //         'customer_name' => $request->customer_name,
    //         'contact_number' => $request->contact_number,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //         'vehicle_registration_number' => $request->vehicle_registration_number,
    //         'make_model' => $request->make_model,
    //         'year_of_manufacture' => $request->year_of_manufacture,
    //         'chassis_number' => 'nullable|string|max:255',
    //         // 'engine_number' => $request->engine_number,
    //         'engine_number' => 'nullable|string|max:255',

    //         'fuel_type' => $request->fuel_type,
    //         'odometer_reading' => $request->odometer_reading,
    //         'service_type' => $request->service_type,
    //         'additional_notes' => $request->additional_notes,
    //         'car_images' => implode(',', $imagePaths),
    //         'arrival_datetime' => $request->arrival_datetime,
    //         'pickup_dropoff_mode' => $request->pickup_dropoff_mode,
    //     ]);

    //     return redirect()->route('vehicle-checkin.index')->with('success', 'Vehicle check-in updated successfully!');
    // }

    public function destroy($id)
    {
        $checkin = VehicleCheckin::findOrFail($id);
        $checkin->delete();

        return redirect()->route('vehicle-checkin.index')->with('success', 'Vehicle check-in deleted successfully!');
    }
}
