<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function index()
    // {
    //     $employees = Employee::with('user')->get();
    //     return view('employees.index', compact('employees'));
    // }
//   public function index(Request $request)
// {
//     $selectedMonth = $request->input('month', Carbon::now()->format('Y-m'));
//     [$year, $month] = explode('-', $selectedMonth);

//     $employees = Employee::with('user')->get();

//     $employees->map(function ($employee) use ($year, $month, $selectedMonth) {
//         $userId = $employee->user_id;
//         $monthlySalary = $employee->salary;
//         $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
//         $currentMonth = Carbon::now()->format('Y-m');

//         $dailySalary = $monthlySalary / $daysInMonth;

//         $presentDays = Attendance::where('employee_id', $userId)
//                                  ->whereYear('date', $year)
//                                  ->whereMonth('date', $month)
//                                  ->where('leave_status', 'Present')
//                                  ->count();
//         $halfday = Attendance::where('employee_id', $userId)
//                                  ->whereYear('date', $year)
//                                  ->whereMonth('date', $month)
//                                  ->where('leave_status', 'Half-day')
//                                  ->count();
     
//         $leaveDays = Leave::where('employee_id', $userId)
//                           ->whereYear('leave_start_date', $year)
//                           ->whereMonth('leave_start_date', $month)
//                           ->where('leave_approval_status', 'Approved') // ✅ Only Approved Leaves
//                           ->sum('total_days_requested');

//         // Assign values
//         $employee->daysInMonth = $daysInMonth;
//         $employee->present_days = $presentDays;
//         $employee->half_days = $halfday;
//         $employee->leave_days = $leaveDays;
        
//           // ✅ If selected month is current month, don't show salary
//         if ($selectedMonth === $currentMonth) {
//             $employee->final_salary = null;
//         } else {
//             $employee->final_salary = ($presentDays > 0) ? max(($daysInMonth - $leaveDays) * $dailySalary, 0) : null;
//         }

      
//         return $employee;
//     });

//     return view('employees.index', compact('employees', 'selectedMonth'));
// }

public function index(Request $request)
{
    $selectedMonth = $request->input('month', Carbon::now()->format('Y-m'));
    [$year, $month] = explode('-', $selectedMonth);

    $employees = Employee::with('user')->get();

    $employees->map(function ($employee) use ($year, $month, $selectedMonth) {
        $userId = $employee->user_id;
        $monthlySalary = $employee->salary;
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $currentMonth = Carbon::now()->format('Y-m');

        $dailySalary = $monthlySalary / $daysInMonth;

        $presentDays = Attendance::where('employee_id', $userId)
                                 ->whereYear('date', $year)
                                 ->whereMonth('date', $month)
                                 ->where('leave_status', 'Present')
                                 ->distinct('date')
                                 ->count();
        $halfDays = Attendance::where('employee_id', $userId)
                              ->whereYear('date', $year)
                              ->whereMonth('date', $month)
                              ->where('leave_status', 'Half-day')
                              ->distinct('date')
                              ->count();
     
        $leaveDays = Leave::where('employee_id', $userId)
                          ->whereYear('leave_start_date', $year)
                          ->whereMonth('leave_start_date', $month)
                          ->where('leave_approval_status', 'Approved') 
                          
                          ->sum('total_days_requested');

        // Assign values
        $employee->daysInMonth = $daysInMonth;
        $employee->present_days = $presentDays;
        $employee->half_days = $halfDays;
        $employee->leave_days = $leaveDays;

        $halfDaysAsLeave = $halfDays / 2;

        // ✅ If selected month is current month, don't show salary
        if ($selectedMonth === $currentMonth) {
            $employee->final_salary = null;
        } else {
            $effectiveWorkingDays = max(($daysInMonth - $leaveDays - $halfDaysAsLeave), 0);
            $employee->final_salary = ($presentDays > 0) ? $effectiveWorkingDays * $dailySalary : null;
        }

        return $employee;
    });

    return view('employees.index', compact('employees', 'selectedMonth'));
}


    public function create()
    {
        $users = User::all();
        return view('employees.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:employees,user_id',
            'salary' => 'required|numeric|min:0',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }
    public function edit(Employee $employee)
    {
        $users = User::all();
        return view('employees.edit', compact('employee', 'users'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
