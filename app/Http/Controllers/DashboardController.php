<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerComplaint;
use App\Models\VehicleCheckin;
use App\Models\JobCard;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Summary data
        $totalCheckins = VehicleCheckin::count();
        $totalComplaints = CustomerComplaint::count();
        $totalJobCards = JobCard::count(); // ✅ New Summary

        // Complaint types count
        $complaintCounts = CustomerComplaint::selectRaw('complaint_type, COUNT(*) as count')
            ->groupBy('complaint_type')
            ->pluck('count', 'complaint_type')
            ->toArray();

        // Job card alerts for expected delivery today or overdue
        $today = Carbon::today();

        $pendingDeliveries = JobCard::with('vehicleCheckin')
            ->whereDate('expected_delivery_date', '<=', $today)
            ->whereDoesntHave('vehicleCheckin.finalBill') // Exclude finalized bills
            ->get();

        // Service type distribution
        $serviceTypes = VehicleCheckin::selectRaw('service_type, COUNT(*) as count')
            ->groupBy('service_type')
            ->pluck('count', 'service_type')
            ->toArray();

        // Attendance data
        $attendanceData = Attendance::selectRaw('employee_name, COUNT(*) as days_present')
            ->groupBy('employee_name')
            ->pluck('days_present', 'employee_name')
            ->toArray();

        // Leave data
        $leaveData = Leave::selectRaw('leave_type, COUNT(*) as count')
            ->groupBy('leave_type')
            ->pluck('count', 'leave_type')
            ->toArray();

        return view('dashboards.dashboard', compact(
            'totalCheckins',
            'totalComplaints',
            'totalJobCards', // ✅ Pass to view
            'complaintCounts',
            'pendingDeliveries',
            'serviceTypes',
            'attendanceData',
            'leaveData'
        ));
    }
}
