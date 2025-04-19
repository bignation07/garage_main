<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use PDF;
class SalaryController extends Controller
{
    // public function index()
    // {
    //     $salaries = Salary::all();
    //     return view('salary.index', compact('salaries'));
    // }
  
    public function index(Request $request)
    {
        // Getting search query from the request
        $query = $request->input('search');
    
        // Query the Salary model with optional filtering and pagination
        $salaries = Salary::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('employee_name', 'like', "%$query%")
                ->orWhere('employee_id', 'like', "%$query%")
                ->orWhere('department', 'like', "%$query%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);  // Adjust the number 10 to however many records per page you want
    
        return view('salary.index', compact('salaries', 'query'));
    }

    public function downloadSalarySlip($id)
    {
        $salary = Salary::findOrFail($id);
    
        $pdf = \PDF::loadView('salary.slip', compact('salary'));
        return $pdf->download('salary_slip_' . $salary->employee_name . '.pdf');
    }
    
    public function create()
    {
        $employees = User::where('role', 'user')->get();
        return view('salary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $netSalary = $request->basic_salary + ($request->overtime_hours * 100) - $request->deductions;

        Salary::create([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'department' => $request->department,
            'basic_salary' => $request->basic_salary,
            'attendance' => $request->attendance,
            'overtime_hours' => $request->overtime_hours,
            'deductions' => $request->deductions,
            'net_salary' => $netSalary,
            'payment_status' => $request->payment_status,
            'payment_mode' => $request->payment_mode,
        ]);

            return redirect()->route('salaries.index')->with('success', 'Salary processed successfully.');

        
    //   return redirect()->route('salaries')->with('success', 'Salary processed successfully.');

    }
    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        return view('salary.edit', compact('salary'));
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::findOrFail($id);

        $netSalary = $request->basic_salary + ($request->overtime_hours * 100) - $request->deductions;

        $salary->update([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'department' => $request->department,
            'basic_salary' => $request->basic_salary,
            'attendance' => $request->attendance,
            'overtime_hours' => $request->overtime_hours,
            'deductions' => $request->deductions,
            'net_salary' => $netSalary,
            'payment_status' => $request->payment_status,
            'payment_mode' => $request->payment_mode,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

}

