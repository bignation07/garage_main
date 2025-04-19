<?php

namespace App\Http\Controllers;

use App\Models\ProfitReport;
use Illuminate\Http\Request;

class ProfitReportController extends Controller
{

public function index(Request $request)
{
    $search = $request->input('search');

    $profitReports = ProfitReport::with(['vehicleCheckin'])
        ->when($search, function ($query, $search) {
            return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('vehicle_registration_number', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get()
        
          ->groupBy(function ($profitReport) {
            return $profitReport->vehicleCheckin->customer_name . ' - ' . 
                   $profitReport->vehicleCheckin->vehicle_registration_number . ' - ' . 
                   $profitReport->vehicleCheckin->id; // Grouping by customer_id as well
        });

    return view('profit-reports.index', compact('profitReports'));
}



    public function store(Request $request)
    {
        $request->validate([
            'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
            'name_of_parts' => 'required|string',
            'selling_price' => 'required|numeric',
            'profit' => 'required|numeric'
        ]);

        ProfitReport::create([
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'name_of_parts' => $request->name_of_parts,
            'selling_price' => $request->selling_price,
            'profit' => $request->profit,
        ]);

        return redirect()->route('profit-reports.index')->with('success', 'Profit Report Created Successfully');
    }
}
