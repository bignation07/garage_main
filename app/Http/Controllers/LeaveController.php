<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;

class LeaveController extends Controller
{
    // public function index()
    // {
    //     $leaves = Leave::all();
    //     return view('leave.index', compact('leaves'));
    // }
    // public function index()
    // {
    //     $leaves = Leave::all();
    //     $employee_name = auth()->user()->name;
    //     $employee_id = auth()->user()->id;
    
    //     return view('leave.index', compact('leaves', 'employee_name', 'employee_id'));
    // }
// public function index()
// {
//     // Admin role: Show all leaves
//     if (auth()->user()->role === 'admin') {
//         $leaves = Leave::orderBy('created_at', 'desc')->get();
//     } else {
//         // User role: Show only their own leaves
//         $leaves = Leave::where('employee_id', auth()->user()->id)
//                       ->orderBy('created_at', 'desc')
//                       ->get();
//     }

//     $employee_name = auth()->user()->name;
//     $employee_id = auth()->user()->id;
//     $employees = User::where('role', 'user')->get();

//     return view('leave.index', compact('leaves', 'employee_name', 'employee_id', 'employees'));
// }
public function index(Request $request)
{
    // Admin role: Show all leaves
    if (auth()->user()->role === 'admin') {
        $query = Leave::query();
    } else {
        // User role: Show only their own leaves
        $query = Leave::where('employee_id', auth()->user()->id);
    }

    // Search functionality
    if ($request->has('search')) {
        $search = $request->search;
        $query->where('employee_name', 'like', '%' . $search . '%')
              ->orWhere('leave_type', 'like', '%' . $search . '%');
    }

    // Paginate results
    $leaves = $query->orderBy('created_at', 'desc')->paginate(6);

    $employee_name = auth()->user()->name;
    $employee_id = auth()->user()->id;
    $employees = User::where('role', 'user')->get();

    return view('leave.index', compact('leaves', 'employee_name', 'employee_id', 'employees'));
}


    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required',
            'employee_id' => 'required',
            'leave_type' => 'required',
            'leave_start_date' => 'required|date',
            'leave_end_date' => 'required|date|after_or_equal:leave_start_date',
        ]);

        $total_days = \Carbon\Carbon::parse($request->leave_start_date)
                        ->diffInDays(\Carbon\Carbon::parse($request->leave_end_date)) + 1;

        Leave::create([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'leave_type' => $request->leave_type,
            'leave_start_date' => $request->leave_start_date,
            'leave_end_date' => $request->leave_end_date,
            'total_days_requested' => $total_days,
        ]);

        return redirect()->back()->with('success', 'Leave Request Submitted Successfully');
    }
    public function update(Request $request, $id)
    {
        $leave = Leave::find($id);
    
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to approve leaves.');
        }
    
        $leave->leave_approval_status = $request->leave_approval_status;
        $leave->save();
    
        return redirect()->back()->with('success', 'Leave Status Updated Successfully by Admin');
    }

    // public function update(Request $request, $id)
    // {
    //     $leave = Leave::find($id);
    //     $leave->leave_approval_status = $request->leave_approval_status;
    //     $leave->save();

    //     return redirect()->back()->with('success', 'Leave Status Updated Successfully');
    // }
}


