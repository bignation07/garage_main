<?php
namespace App\Http\Controllers;

use App\Models\WorkAssignment;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;
use PDF;

class WorkAssignmentController extends Controller {
    
    public function index() {
        $workAssignments = WorkAssignment::with('vehicleCheckin')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('work_assignments.index', compact('workAssignments'));
    }

    public function create() {
        $customers = VehicleCheckin::orderBy('id', 'desc')->get();
        // $customers = VehicleCheckin::all();
        return view('work_assignments.create', compact('customers'));
    }

    public function store(Request $request) {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'name_of_work.*' => 'required|string',
            'completed.*' => 'boolean',
            'result.*' => 'nullable|string',
            'mechanic.*' => 'required|string'
        ]);

        foreach ($request->name_of_work as $index => $name) {
            WorkAssignment::create([
                'vehicle_checkin_id' => $request->vehicle_checkin_id,
                'name_of_work' => $name,
                'completed' => $request->completed[$index] ?? false,
                'result' => $request->result[$index] ?? null,
                'mechanic' => $request->mechanic[$index]
            ]);
        }

        return redirect()->route('work_assignments.index')->with('success', 'Work assignments created successfully.');
    }

    public function downloadworkassignments($checkinId) {
        $checkin = VehicleCheckin::findOrFail($checkinId);
        $workAssignments = WorkAssignment::where('vehicle_checkin_id', $checkinId)
                            ->with('vehicleCheckin')
                            ->get()
                            ->groupBy('vehicle_checkin_id'); // Grouping by customer ID

        $pdf = PDF::loadView('work_assignments.customer_checklist_pdf', compact('checkin', 'workAssignments'));

        return $pdf->download('work_assignments_' . $checkin->customer_name . '.pdf');
    }

public function edit($checkinId) {
    $workAssignments = WorkAssignment::where('vehicle_checkin_id', $checkinId)->get();

    if ($workAssignments->isEmpty()) {
        return redirect()->route('work_assignments.index')->with('error', 'No work assignments found for this customer.');
    }

    return view('work_assignments.edit', compact('workAssignments'));
}


public function update(Request $request, $checkinId) {
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'name_of_work.*' => 'required|string',
        'completed.*' => 'boolean',
        'result.*' => 'nullable|string',
        'mechanic.*' => 'required|string',
        'work_assignment_ids.*' => 'nullable|exists:work_assignments,id'
    ]);

    foreach ($request->name_of_work as $index => $name) {
        if (!empty($request->work_assignment_ids[$index])) {
            // Update existing work assignment
            WorkAssignment::where('id', $request->work_assignment_ids[$index])->update([
                'name_of_work' => $name,
                'completed' => $request->completed[$index] ?? false,
                'result' => $request->result[$index] ?? null,
                'mechanic' => $request->mechanic[$index]
            ]);
        } else {
            // Create new work assignment
            WorkAssignment::create([
                'vehicle_checkin_id' => $request->vehicle_checkin_id,
                'name_of_work' => $name,
                'completed' => $request->completed[$index] ?? false,
                'result' => $request->result[$index] ?? null,
                'mechanic' => $request->mechanic[$index]
            ]);
        }
    }

    return redirect()->route('work_assignments.index')->with('success', 'Work assignments updated successfully.');
}


    public function destroy(WorkAssignment $workAssignment) {
        $workAssignment->delete();
        return redirect()->route('work_assignments.index')->with('success', 'Work assignment deleted successfully.');
    }
}
