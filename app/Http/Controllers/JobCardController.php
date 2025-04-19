<?php


namespace App\Http\Controllers;

use App\Models\JobCard;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobCardController extends Controller
{
    // public function index()
    // {
    //     $jobCards = JobCard::with('vehicleCheckin')->get();
    //     return view('job-cards.index', compact('jobCards'));
    // }
    public function index(Request $request)
    {
        // Get search query from the request
        $search = $request->input('search');
        
        // Query to filter job cards
        $jobCards = JobCard::with('vehicleCheckin')
            ->when($search, function ($query, $search) {
                return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
                    $q->where('customer_name', 'like', '%' . $search . '%')
                    ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('created_at', 'desc') // Order by created_at
            ->paginate(8); // Pagination with 10 items per page

        return view('job-cards.index', compact('jobCards', 'search'));
    }
    public function create()
    {
        $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
        // $checkins = VehicleCheckin::all();
        
        return view('job-cards.create', compact('checkins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'service_advisor' => 'required|string',
            'mechanic' => 'required|string',
            'expected_delivery_date' => 'required|date',
            'fuel_level' => 'required|in:Empty,Low,Half,Full',
            // 'vehicle_condition' => 'required|array',
            'vehicle_condition' => 'nullable|string',
            'additional_work' => 'required|boolean',
            // 'estimated_cost' => 'required|numeric',
            'advance_payment' => 'nullable|numeric',
            'customer_signature' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $jobCardNumber = 'JC' . now()->timestamp;

        $signaturePath = null;
        if ($request->hasFile('customer_signature')) {
            $signaturePath = $request->file('customer_signature')->store('signatures', 'public');
        }

        JobCard::create([
            'job_card_number' => $jobCardNumber,
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'service_advisor' => $request->service_advisor,
            'mechanic' => $request->mechanic,
            'expected_delivery_date' => $request->expected_delivery_date,
            'fuel_level' => $request->fuel_level,
            // 'vehicle_condition' => json_encode($request->vehicle_condition),
            'vehicle_condition' => $request->vehicle_condition,
            'additional_work' => $request->additional_work,
            // 'estimated_cost' => $request->estimated_cost,
            'advance_payment' => $request->advance_payment,
            'customer_signature' => $signaturePath,
        ]);

        return redirect()->route('job-cards.index')->with('success', 'Job card created successfully.');
    }

    public function edit($id)
    {
        $jobCard = JobCard::findOrFail($id);
        $checkins = VehicleCheckin::all();
        return view('job-cards.edit', compact('jobCard', 'checkins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'service_advisor' => 'required|string',
            'mechanic' => 'required|string',
            'expected_delivery_date' => 'required|date',
            'fuel_level' => 'required|in:Empty,Low,Half,Full',
            // 'vehicle_condition' => 'required|array',
            'vehicle_condition' => 'nullable|string',
            'additional_work' => 'required|boolean',
            // 'estimated_cost' => 'required|numeric',
            'advance_payment' => 'nullable|numeric',
            'customer_signature' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $jobCard = JobCard::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('customer_signature')) {
            // Delete old signature if it exists
            if ($jobCard->customer_signature) {
                Storage::delete('public/' . $jobCard->customer_signature);
            }

            // Store new signature
            $signaturePath = $request->file('customer_signature')->store('signatures', 'public');
            $jobCard->customer_signature = $signaturePath;
        }

        // Update JobCard fields
        $jobCard->update([
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'service_advisor' => $request->service_advisor,
            'mechanic' => $request->mechanic,
            'expected_delivery_date' => $request->expected_delivery_date,
            'fuel_level' => $request->fuel_level,
            // 'vehicle_condition' => json_encode($request->vehicle_condition),
            'vehicle_condition' => $request->vehicle_condition,
            'additional_work' => $request->additional_work,
            // 'estimated_cost' => $request->estimated_cost,
            'advance_payment' => $request->advance_payment,
        ]);

        return redirect()->route('job-cards.index')->with('success', 'Job card updated successfully.');
    }

    public function destroy($id)
    {
        $checkin = JobCard::findOrFail($id);
        $checkin->delete();

        return redirect()->route('job-cards.index')->with('success', 'job-cards check-in deleted successfully!');
    }
}

