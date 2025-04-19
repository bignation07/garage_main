<?php

namespace App\Http\Controllers;

use App\Models\CustomerComplaint;
use App\Models\VehicleCheckin;
use App\Models\VehicleChecklist;
use Illuminate\Http\Request;
use PDF;
class CustomerComplaintController extends Controller
{
public function index(Request $request)
{
    // Get search query from the request
    $search = $request->input('search');

    // Query to filter customer complaints
    $complaints = CustomerComplaint::with('vehicleCheckin')
        ->when($search, function ($query, $search) {
            return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
                $q->where('customer_name', 'like', '%' . $search . '%')
                  ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%');
            });
        })
        ->orderBy('created_at', 'desc') // Order complaints by created_at in descending order
        ->paginate(10); // Pagination with 10 items per page

    return view('customer-complaints.index', compact('complaints', 'search'));
}


// public function index(Request $request)
// {
//     // Get search query from the request
//     $search = $request->input('search');

//     // Query to filter customer complaints
//     $complaints = CustomerComplaint::with('vehicleCheckin')
//         ->when($search, function ($query, $search) {
//             return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
//                 $q->where('customer_name', 'like', '%' . $search . '%')
//                   ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%');
//             });
//         })
//         ->orderBy('created_at', 'desc') // Order complaints by created_at in descending order
//         ->paginate(100); // Pagination with 8 items per page

//     return view('customer-complaints.index', compact('complaints', 'search'));
// }
public function downloadCustomerChecklist($checkinId)
{
    // Fetch the check-in record based on the passed ID
    $checkin = VehicleCheckin::findOrFail($checkinId);

    // Get all checklists for this check-in
    $checklists = VehicleChecklist::where('vehicle_checkin_id', $checkinId)->get();

    // Get all complaints related to this check-in
    $customerComplaints = CustomerComplaint::where('vehicle_checkin_id', $checkinId)->get();

    // Load the PDF view with data (checklist and complaints)
    $pdf = \PDF::loadView('customer-complaints.customer_checklist_pdf', compact('checkin', 'checklists', 'customerComplaints'));

    // Return the generated PDF as a download with the customer's name as the filename
    return $pdf->download('vehicle_checklist_' . $checkin->customer_name . '.pdf');
}


    
    public function create()
    {
        // $checkins = VehicleCheckin::all();
        $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
        return view('customer-complaints.create', compact('checkins'));
    }

 
public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'description' => 'required|array',
        'description.*' => 'required|string', // Each description must be a string
        'complaint_type' => 'required|array',
        'complaint_type.*' => 'required|in:Mechanical,Electrical,Body,AC,Performance,Others',
        'previous_repairs_done' => 'required|array',
        'previous_repairs_done.*' => 'required|boolean',
        'urgency_level' => 'required|array',
        'urgency_level.*' => 'required|in:High,Medium,Low',
    ]);

    // Extract vehicle check-in ID
    $vehicleCheckinId = $request->vehicle_checkin_id;

    // Prepare the data for all complaints
    $complaintsData = [];
    foreach ($request->description as $key => $description) {
        $complaintsData[] = [
            'vehicle_checkin_id' => $vehicleCheckinId, // Use the same vehicle check-in ID for all complaints
            'description' => $description,
            'complaint_type' => $request->complaint_type[$key],
            'previous_repairs_done' => $request->previous_repairs_done[$key],
            'urgency_level' => $request->urgency_level[$key],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    // Insert multiple complaints at once
    CustomerComplaint::insert($complaintsData);

    return redirect()->route('customer-complaints.index')->with('success', 'Complaints added successfully.');
}
public function edit($id)
{
    $complaint = CustomerComplaint::findOrFail($id);
    $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
    return view('customer-complaints.edit', compact('complaint', 'checkins'));
}

public function update(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'description' => 'required|string',
        'complaint_type' => 'required|in:Mechanical,Electrical,Body,AC,Performance,Others',
        'previous_repairs_done' => 'required|boolean',
        'urgency_level' => 'required|in:High,Medium,Low',
    ]);

    // Find the existing complaint and update its details
    $complaint = CustomerComplaint::findOrFail($id);
    $complaint->update([
        'vehicle_checkin_id' => $request->vehicle_checkin_id,
        'description' => $request->description,
        'complaint_type' => $request->complaint_type,
        'previous_repairs_done' => $request->previous_repairs_done,
        'urgency_level' => $request->urgency_level,
    ]);

    return redirect()->route('customer-complaints.index')->with('success', 'Complaint updated successfully.');
}

  

    public function destroy($id)
    {
        $complaint = CustomerComplaint::findOrFail($id);
        $complaint->delete();

        return redirect()->route('customer-complaints.index')->with('success', 'Complaint deleted successfully.');
    }
}
