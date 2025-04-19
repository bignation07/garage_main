<?php

namespace App\Http\Controllers;

use App\Models\EstimatedInspection;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstimatedInspectionController extends Controller
{
    // public function index()
    // {
    //     $inspections = EstimatedInspection::with('vehicleCheckin')->get();
    //     return view('estimated-inspections.index', compact('inspections'));
    // }
  public function index(Request $request)
{
    // Get search query from the request
    $search = $request->input('search');
    
    // Query to filter customer complaints
    $inspections = EstimatedInspection::with('vehicleCheckin')
        ->when($search, function ($query, $search) {
            return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
                $q->where('customer_name', 'like', '%' . $search . '%')
                  ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%');
            });
        })
        ->orderBy('created_at', 'desc') // Order by created_at
        ->paginate(8); // Pagination with 8 items per page

    return view('estimated-inspections.index', compact('inspections', 'search'));
}


    public function create()
    {
        $checkins = VehicleCheckin::all();
        return view('estimated-inspections.create', compact('checkins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'inspection_report' => 'required|string',
            'issues_identified' => 'required|array',
            'parts_required' => 'required|string',
            'estimated_cost' => 'required|numeric',
            'approval_status' => 'required|in:Pending,Approved,Rejected',
            'customer_approval_method' => 'required|in:WhatsApp,Call,Email',
            'approval_date_time' => 'nullable|date',
            'customer_signature' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $signaturePath = null;
        if ($request->hasFile('customer_signature')) {
            $signaturePath = $request->file('customer_signature')->store('signatures', 'public');
        }

        EstimatedInspection::create([
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'inspection_report' => $request->inspection_report,
            'issues_identified' => json_encode($request->issues_identified),
            'parts_required' => $request->parts_required,
            'estimated_cost' => $request->estimated_cost,
            'approval_status' => $request->approval_status,
            'customer_approval_method' => $request->customer_approval_method,
            'approval_date_time' => $request->approval_date_time,
            'customer_signature' => $signaturePath,
        ]);

        return redirect()->route('estimated-inspections.index')->with('success', 'Inspection estimate added successfully.');
    }

    public function edit($id)
    {
        $inspection = EstimatedInspection::findOrFail($id);
        $checkins = VehicleCheckin::all();
        return view('estimated-inspections.edit', compact('inspection', 'checkins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'inspection_report' => 'required|string',
            'issues_identified' => 'required|array',
            'parts_required' => 'required|string',
            'estimated_cost' => 'required|numeric',
            'approval_status' => 'required|in:Pending,Approved,Rejected',
            'customer_approval_method' => 'required|in:WhatsApp,Call,Email',
            'approval_date_time' => 'nullable|date',
            'customer_signature' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $inspection = EstimatedInspection::findOrFail($id);

        if ($request->hasFile('customer_signature')) {
            if ($inspection->customer_signature) {
                Storage::delete('public/' . $inspection->customer_signature);
            }
            $signaturePath = $request->file('customer_signature')->store('signatures', 'public');
            $inspection->customer_signature = $signaturePath;
        }

        $inspection->update([
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'inspection_report' => $request->inspection_report,
            'issues_identified' => json_encode($request->issues_identified),
            'parts_required' => $request->parts_required,
            'estimated_cost' => $request->estimated_cost,
            'approval_status' => $request->approval_status,
            'customer_approval_method' => $request->customer_approval_method,
            'approval_date_time' => $request->approval_date_time,
        ]);

        return redirect()->route('estimated-inspections.index')->with('success', 'Inspection estimate updated successfully.');
    }
    public function destroy($id)
    {
        $complaint = EstimatedInspection::findOrFail($id);
        $complaint->delete();

        return redirect()->route('estimated-inspections.index')->with('success', 'Complaint deleted successfully.');
    }
}
