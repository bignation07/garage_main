<?php

namespace App\Http\Controllers;

use App\Models\WorkStart;
use App\Models\JobCard;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;

class WorkStartController extends Controller
{
    // public function index()
    // {
    //     $workStarts = WorkStart::with('jobCard')->get();
    //     return view('work-starts.index', compact('workStarts'));
    // }
public function index(Request $request)
{
    // Get the search query from the request
    $search = $request->input('search');
    
    // Query to filter work starts based on the search term
    $workStarts = WorkStart::with('jobCard')
        ->when($search, function ($query, $search) {
            return $query->whereHas('jobCard', function ($q) use ($search) {
                $q->where('job_card_number', 'like', '%' . $search . '%');
            })
            ->orWhere('mechanic_assigned', 'like', '%' . $search . '%')
            ->orWhere('parts_purchased', 'like', '%' . $search . '%');
        })
        ->paginate(8); // Paginate results (8 entries per page)

    return view('work-starts.index', compact('workStarts', 'search'));
}

    public function create()
    {
        $jobCards = JobCard::all();
         $customers = VehicleCheckin::select('customer_name')->distinct()->get();
        return view('work-starts.create', compact('jobCards','customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_card_id' => 'required|exists:job_cards,id',
            'start_date_time' => 'required|date',
            'mechanic_assigned' => 'required|string|max:255',
            'parts_purchased' => 'nullable|string|max:255',
            'vendor_name' => 'nullable|string|max:255',
            'invoice_details' => 'nullable|string|max:255',
            'total_parts_cost' => 'nullable|numeric',
            'estimated_service_charge' => 'nullable|numeric',
            'margin_calculation' => 'nullable|numeric',
            'status' => 'required|in:In Progress,Completed,Delivered',
            'customer_notification_sent' => 'boolean',
        ]);

        WorkStart::create($request->all());

        return redirect()->route('work-starts.index')->with('success', 'Work Start entry added successfully.');
    }

    public function edit($id)
    {
        $workStart = WorkStart::findOrFail($id);
        $jobCards = JobCard::all();
        return view('work-starts.edit', compact('workStart', 'jobCards'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'job_card_id' => 'required|exists:job_cards,id',
            'start_date_time' => 'required|date',
            'mechanic_assigned' => 'required|string|max:255',
            'parts_purchased' => 'nullable|string|max:255',
            'vendor_name' => 'nullable|string|max:255',
            'invoice_details' => 'nullable|string|max:255',
            'total_parts_cost' => 'nullable|numeric',
            'estimated_service_charge' => 'nullable|numeric',
            'margin_calculation' => 'nullable|numeric',
            'status' => 'required|in:In Progress,Completed,Delivered',
            'customer_notification_sent' => 'boolean',
        ]);

        $workStart = WorkStart::findOrFail($id);
        $workStart->update($request->all());

        return redirect()->route('work-starts.index')->with('success', 'Work Start entry updated successfully.');
    }
    public function destroy($id)
    {
        $complaint = WorkStart::findOrFail($id);
        $complaint->delete();

        return redirect()->route('work-starts.index')->with('success', 'Complaint deleted successfully.');
    }
}
