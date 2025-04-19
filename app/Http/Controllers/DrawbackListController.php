<?php

namespace App\Http\Controllers;

use App\Models\DrawbackList;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;

class DrawbackListController extends Controller
{
    // public function index()
    // {
    //     $drawbacks = DrawbackList::with('vehicleCheckin')->get();
    //     return view('drawbacks.index', compact('drawbacks'));
    // }
    public function index(Request $request)
{
    // Get search query from the request
    $search = $request->input('search');
    
    // Query to filter drawback issues based on the search term
    $drawbacks = DrawbackList::with('vehicleCheckin')
        ->when($search, function ($query, $search) {
            return $query->where('issue_name', 'like', '%' . $search . '%')
                         ->orWhere('mechanic_notes', 'like', '%' . $search . '%')
                         ->orWhereHas('vehicleCheckin', function ($q) use ($search) {
                             $q->where('customer_name', 'like', '%' . $search . '%');
                         });
        })
        ->paginate(8); // Paginate with 8 items per page

    return view('drawbacks.index', compact('drawbacks', 'search'));
}


    public function create()
    {
        // $checkins = VehicleCheckin::all();
         $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
        return view('drawbacks.create', compact('checkins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'issue_name' => 'required|string|max:255',
            'issue_severity' => 'required|in:Minor,Major,Critical',
            'additional_repairs' => 'nullable|string',
            'mechanic_notes' => 'nullable|string',
        ]);

        DrawbackList::create($request->all());

        return redirect()->route('drawbacks.index')->with('success', 'Drawback issue added successfully.');
    }

    public function edit($id)
    {
        $drawback = DrawbackList::findOrFail($id);
        $checkins = VehicleCheckin::all();
        return view('drawbacks.edit', compact('drawback', 'checkins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'issue_name' => 'required|string|max:255',
            'issue_severity' => 'required|in:Minor,Major,Critical',
            'additional_repairs' => 'nullable|string',
            'mechanic_notes' => 'nullable|string',
        ]);

        $drawback = DrawbackList::findOrFail($id);
        $drawback->update($request->all());

        return redirect()->route('drawbacks.index')->with('success', 'Drawback issue updated successfully.');
    }
    public function destroy($id)
    {
        $complaint = DrawbackList::findOrFail($id);
        $complaint->delete();

        return redirect()->route('drawbacks.index')->with('success', 'Complaint deleted successfully.');
    }
}
