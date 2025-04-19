<?php

namespace App\Http\Controllers;

use App\Models\DrawbackPart;
use App\Models\DrawbackList;
use Illuminate\Http\Request;

class DrawbackPartController extends Controller
{
    // public function index()
    // {
    //     $drawbackParts = DrawbackPart::with('drawbackList')->get();
    //     return view('drawback-parts.index', compact('drawbackParts'));
    // }

public function index(Request $request)
{
    // Get search query from the request
    $search = $request->input('search');
    
    // Query to filter the drawback parts based on the search term
    $drawbackParts = DrawbackPart::with('drawbackList')
        ->when($search, function ($query, $search) {
            return $query->where('issue_name', 'like', '%' . $search . '%')
                         ->orWhere('spare_part_needed', 'like', '%' . $search . '%')
                         ->orWhere('part_number', 'like', '%' . $search . '%');
        })
        ->paginate(8); // Use pagination (8 items per page)

    return view('drawback-parts.index', compact('drawbackParts', 'search'));
}

    public function create()
    {
        // $drawbacks = DrawbackList::all();
         $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
        return view('drawback-parts.create', compact('drawbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'drawback_list_id' => 'required|exists:drawback_lists,id',
            'issue_name' => 'required|string|max:255',
            'spare_part_needed' => 'required|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'estimated_cost' => 'nullable|numeric',
            'parts_availability' => 'required|in:In Stock,Ordered,Not Available',
        ]);

        DrawbackPart::create($request->all());

        return redirect()->route('drawback-parts.index')->with('success', 'Drawback Part added successfully.');
    }

    public function edit($id)
    {
        $drawbackPart = DrawbackPart::findOrFail($id);
        $drawbacks = DrawbackList::all();
        return view('drawback-parts.edit', compact('drawbackPart', 'drawbacks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'drawback_list_id' => 'required|exists:drawback_lists,id',
            'issue_name' => 'required|string|max:255',
            'spare_part_needed' => 'required|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'estimated_cost' => 'nullable|numeric',
            'parts_availability' => 'required|in:In Stock,Ordered,Not Available',
        ]);

        $drawbackPart = DrawbackPart::findOrFail($id);
        $drawbackPart->update($request->all());

        return redirect()->route('drawback-parts.index')->with('success', 'Drawback Part updated successfully.');
    }
    public function destroy($id)
    {
        $complaint = DrawbackPart::findOrFail($id);
        $complaint->delete();

        return redirect()->route('drawback-parts.index')->with('success', 'Complaint deleted successfully.');
    }
}
