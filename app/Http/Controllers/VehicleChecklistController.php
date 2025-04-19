<?php

namespace App\Http\Controllers;

use App\Models\VehicleChecklist;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;
use PDF;
class VehicleChecklistController extends Controller
{
    // Show all checklists
    // public function index()
    // {
    //     $checklists = VehicleChecklist::all();
    //     return view('vehicle_checklist.index', compact('checklists'));
    // }
public function index()
{
    // Get customers who have at least one checklist, sorted by creation date (newest first)
    $checkins = VehicleCheckin::has('checklists')
                              ->orderBy('created_at', 'desc')  // Sort by creation date in descending order
                              ->get();

    // Get all checklists for these customers
    $checklists = VehicleChecklist::whereIn('vehicle_checkin_id', $checkins->pluck('id'))->get();

    return view('vehicle_checklist.index', compact('checklists', 'checkins'));
}



    // Show the form to create a new checklist
    // public function create()
    // {
    //     // List of categories as you specified
    //     $categories = [
    //         'BODY & FRAME', 'ENGINE', 'TRANSMISSION', 'SUSPENSION', 'WHEELS & TYRES', 
    //         'CONTROL SYSTEM', 'ELECTRICAL SYSTEM', 'AC SYSTEM', 'WATER COOLING SYSTEM', 
    //         'ALL BEARING', 'DASH BOARD & WARNING LIGHTS', 'SENSOR & REVERSE', 
    //         'EXHAUST SYSTEM', 'VALUE ADDED SERVICES', 'BATTERY TERMINAL GREASING', 
    //         'FULL POLISH', 'CHANNEL GREASING', 'SILENCER COATING', 'INTER WASH', 
    //         'RAT REPELLENT'
    //     ];

    //     return view('vehicle_checklist.create', compact('categories'));
    // }
    public function create()
{
    // Fetch all vehicle check-ins from the database
    $checkins = VehicleCheckin::all();  // Fetch all check-ins

    // List of categories as you specified
    $categories = [
        'BODY & FRAME', 'ENGINE', 'TRANSMISSION', 'SUSPENSION', 'WHEELS & TYRES', 
        'CONTROL SYSTEM', 'ELECTRICAL SYSTEM', 'AC SYSTEM', 'WATER COOLING SYSTEM', 
        'ALL BEARING', 'DASH BOARD & WARNING LIGHTS', 'SENSOR & REVERSE', 
        'EXHAUST SYSTEM', 'VALUE ADDED SERVICES', 'BATTERY TERMINAL GREASING', 
        'FULL POLISH', 'CHANNEL GREASING', 'SILENCER COATING', 'INTER WASH', 
        'RAT REPELLENT'
    ];

    // Return the create view with checkins and categories
    return view('vehicle_checklist.create', compact('categories', 'checkins'));
}


// public function showChecklistsByCustomer($checkinId)
// {
//     $checklists = VehicleChecklist::where('vehicle_checkin_id', $checkinId)->get();
//     $checkin = VehicleCheckin::findOrFail($checkinId);

//     return view('vehicle_checklist.customer_checklist', compact('checklists', 'checkin'));
// }
public function showChecklistsByCustomer($checkinId)
{
    $checklists = VehicleChecklist::where('vehicle_checkin_id', $checkinId)->get();
    $checkin = VehicleCheckin::findOrFail($checkinId);

    return view('vehicle_checklist.customer_checklist', compact('checklists', 'checkin'));
}


    // Store the submitted checklist data
    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'checklist' => 'required|array',
    //         'checklist.*.part_name' => 'nullable|string|max:255',
    //         'checklist.*.qty' => 'nullable|integer|min:0',
    //         'checklist.*.rate' => 'nullable|numeric|min:0',
    //     ]);

    //     // Loop through each category's checklist data
    //     foreach ($request->checklist as $category => $checklistData) {
    //         // Only insert if part_name, qty, or rate is provided (at least one field should be filled)
    //         if (!empty($checklistData['part_name']) || !empty($checklistData['qty']) || !empty($checklistData['rate'])) {
    //             // Add the category key to the data to be inserted into the database
    //             $checklistData['category'] = $category;

    //             // Save the checklist entry
    //             VehicleChecklist::create($checklistData);
    //         }
    //     }

    //     return redirect()->route('vehicle-checklist.index')->with('success', 'Vehicle checklist items added successfully.');
    // }
    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'checklist' => 'required|array',
        'checklist.*.part_name' => 'nullable|string|max:255',
        'checklist.*.qty' => 'nullable|integer|min:0',
        'checklist.*.rate' => 'nullable|numeric|min:0',
    ]);

    // Loop through each category's checklist data
    foreach ($request->checklist as $category => $checklistData) {
        // Only insert if part_name, qty, or rate is provided (at least one field should be filled)
        if (!empty($checklistData['part_name']) || !empty($checklistData['qty']) || !empty($checklistData['rate'])) {
            // Add the category and vehicle_checkin_id to the data to be inserted into the database
            $checklistData['category'] = $category;
            $checklistData['vehicle_checkin_id'] = $request->vehicle_checkin_id;

            // Save the checklist entry
            VehicleChecklist::create($checklistData);
        }
    }

    return redirect()->route('vehicle-checklist.index')->with('success', 'Vehicle checklist items added successfully.');
}

 public function downloadCustomerChecklist($checkinId)
{
    // Get the customer check-in data
    $checkin = VehicleCheckin::findOrFail($checkinId);
    
    // Get all checklists for this customer
    $checklists = VehicleChecklist::where('vehicle_checkin_id', $checkinId)->get();
    
    // Load the PDF view and pass the data to it
    $pdf = \PDF::loadView('vehicle_checklist.customer_checklist_pdf', compact('checkin', 'checklists'));
    
    // Return the PDF as a downloadable file with the customer's name in the filename
    return $pdf->download('vehicle_checklist_' . $checkin->customer_name . '.pdf');
}

    // Show the form to edit a checklist
  // Show the form to edit a checklist
public function edit($id)
{
     $checkins = VehicleCheckin::all(); 
    // List of categories as you specified
    $categories = [
        'BODY & FRAME', 'ENGINE', 'TRANSMISSION', 'SUSPENSION', 'WHEELS & TYRES', 
        'CONTROL SYSTEM', 'ELECTRICAL SYSTEM', 'AC SYSTEM', 'WATER COOLING SYSTEM', 
        'ALL BEARING', 'DASH BOARD & WARNING LIGHTS', 'SENSOR & REVERSE', 
        'EXHAUST SYSTEM', 'VALUE ADDED SERVICES', 'BATTERY TERMINAL GREASING', 
        'FULL POLISH', 'CHANNEL GREASING', 'SILENCER COATING', 'INTER WASH', 
        'RAT REPELLENT'
    ];

    // Find the checklist entry by ID
    $checklist = VehicleChecklist::findOrFail($id);

    // Return the edit view with the checklist and categories
    return view('vehicle_checklist.edit', compact('checklist', 'categories','checkins'));
}


 public function update(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'checklist' => 'required|array',
        'checklist.*.part_name' => 'nullable|string|max:255',
        'checklist.*.qty' => 'nullable|integer|min:0',
        'checklist.*.rate' => 'nullable|numeric|min:0',
    ]);

    // Find the checklist entry by ID
    $checklist = VehicleChecklist::findOrFail($id);

    // Loop through the checklist data and update it
    foreach ($request->checklist as $category => $checklistData) {
        // Update only if part_name, qty, or rate is provided
        if (!empty($checklistData['part_name']) || !empty($checklistData['qty']) || !empty($checklistData['rate'])) {
            // Find existing checklist data for the category
            $existingChecklist = VehicleChecklist::where('vehicle_checkin_id', $request->vehicle_checkin_id)
                                                 ->where('category', $category)
                                                 ->first();

            if ($existingChecklist) {
                // Update the existing checklist data
                $existingChecklist->update([
                    'part_name' => $checklistData['part_name'],
                    'qty' => $checklistData['qty'],
                    'rate' => $checklistData['rate'],
                ]);
            } else {
                // Create new checklist entry if none exists
                VehicleChecklist::create([
                    'vehicle_checkin_id' => $request->vehicle_checkin_id,
                    'category' => $category,
                    'part_name' => $checklistData['part_name'],
                    'qty' => $checklistData['qty'],
                    'rate' => $checklistData['rate'],
                ]);
            }
        }
    }

    return redirect()->route('vehicle-checklist.index')->with('success', 'Vehicle checklist updated successfully.');
}


    // Delete the checklist
    public function destroy($id)
    {
        $checklist = VehicleChecklist::findOrFail($id);
        $checklist->delete();

        return redirect()->route('vehicle-checklist.index')->with('success', 'Vehicle checklist item deleted successfully.');
    }
}
