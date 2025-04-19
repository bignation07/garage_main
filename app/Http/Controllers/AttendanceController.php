<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
   
public function index(Request $request)
{
    // Get all employees for the dropdown
    $employees = User::where('role', 'user')->get();

    // Initialize the query
    $query = Attendance::query();

    // Apply the search filter if search term exists
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('employee_name', 'like', "%{$search}%")
              ->orWhere('date', 'like', "%{$search}%")
              ->orWhere('leave_status', 'like', "%{$search}%");
        });
    }

    // Check if the user is an admin or a regular employee
    if (auth()->user()->role === 'admin') {
        // Admin: Get all records, ordered by the newest first
        $attendances = $query->orderBy('created_at', 'desc')->paginate(6);
    } else {
        // Regular user: Get only the records for the logged-in employee, ordered by the newest first
        $attendances = $query->where('employee_id', auth()->user()->id)
                             ->orderBy('created_at', 'desc')
                             ->paginate(6);
    }

    // Return the view with the paginated results
    return view('attendance.index', compact('attendances', 'employees'));
}

    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required',
            'employee_id' => 'required|integer',
            'date' => 'required|date',
            'check_in_time' => 'nullable|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'leave_status' => 'required',
        ]);

        Attendance::create($request->all());
        return redirect()->back()->with('success', 'Attendance Recorded Successfully');
    }
}
