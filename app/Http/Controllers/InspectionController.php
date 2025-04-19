<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;
use PDF;
class InspectionController extends Controller
{
    // List all inspections
public function index(Request $request)
{
    // Search functionality
    $search = $request->input('search');
    $inspections = Inspection::with('vehicleCheckin')
        ->whereHas('vehicleCheckin') // Ensures only inspections with a vehicleCheckin are retrieved
        ->when($search, function ($query, $search) {
            return $query->whereHas('vehicleCheckin', function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('vehicle_registration_number', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function ($inspection) {
            return optional($inspection->vehicleCheckin)->customer_name . ' - ' . optional($inspection->vehicleCheckin)->vehicle_registration_number .' - ' . optional($inspection->vehicleCheckin)->id;
        });

    return view('inspections.index', compact('inspections'));
}

// public function sendWhatsAppMessage($checkinId)
// {
//     // Fetch the check-in record and related inspections
//     $checkin = VehicleCheckin::findOrFail($checkinId);
//     $customerComplaints = Inspection::where('vehicle_checkin_id', $checkinId)->get();

//     // Extract the customer's contact number
//     $contactNumber = $checkin->contact_number;

//     // Generate the message content
//     $message = "Hello " . $checkin->customer_name . ",\n\n";
//     $message .= "Here are the inspection details for your vehicle (Registration: " . $checkin->vehicle_registration_number . "):\n\n";

//     foreach ($customerComplaints as $inspection) {
//         $message .= "Inspection Item: " . $inspection->inspection_item . "\n";
//         $message .= "Check: " . ($inspection->check ? '✔' : '✘') . "\n";
//         $message .= "Deficiencies: " . $inspection->deficiencies . "\n";
//         $message .= "Services Performed: " . $inspection->services_performed . "\n\n";
//     }

//     // $message .= "You can view or download your inspection details using this link: " . route('inspections.download-customer', $checkinId);

//     // URL encode the message for WhatsApp
//     $encodedMessage = urlencode($message);

//     // WhatsApp URL with pre-filled message and the customer's contact number
//     $whatsAppUrl = "https://wa.me/{$contactNumber}?text=" . $encodedMessage;

//     // Return the URL (or redirect)
//     return redirect($whatsAppUrl);
// }
public function sendWhatsAppMessage($checkinId)
{
    // Fetch the check-in record and related inspections
    $checkin = VehicleCheckin::findOrFail($checkinId);
    $customerComplaints = Inspection::where('vehicle_checkin_id', $checkinId)->get();

    // Extract the customer's contact number
    $contactNumber = $checkin->contact_number;

    // Initialize counters
    $totalInspections = $customerComplaints->count();
    $checkedCount = 0;
    $uncheckedCount = 0;
    $totalServicesPerformed = 0; // For summing services_performed

    // Generate the message content
    $message = "Hello " . $checkin->customer_name . ",\n\n";
    $message .= "Here are the inspection details for your vehicle (Registration: " . $checkin->vehicle_registration_number . "):\n\n";

    foreach ($customerComplaints as $inspection) {
        $message .= "Inspection Item: " . $inspection->inspection_item . "\n";
        $message .= "Check: " . ($inspection->check ? '✔' : '✘') . "\n";
        $message .= "Deficiencies: " . $inspection->deficiencies . "\n";
        $message .= "Services Performed: " . $inspection->services_performed . "\n\n";

        // Count checked/unchecked
        if ($inspection->check) {
            $checkedCount++;
        } else {
            $uncheckedCount++;
        }

        // Sum services_performed (if numeric)
        if (is_numeric($inspection->services_performed)) {
            $totalServicesPerformed += $inspection->services_performed;
        }
    }

    // Add summary
    $message .= "----------------------------\n";
    $message .= "Summary:\n";
    $message .= "Total Inspections: " . $totalInspections . "\n";
    $message .= "✔ Checked: " . $checkedCount . "\n";
    $message .= "✘ Unchecked: " . $uncheckedCount . "\n";
    $message .= "Total Services Performed (sum): " . $totalServicesPerformed . "\n";
    $message .= "----------------------------\n";

    // URL encode the message for WhatsApp
    $encodedMessage = urlencode($message);

    // WhatsApp URL with pre-filled message and the customer's contact number
    $whatsAppUrl = "https://wa.me/{$contactNumber}?text=" . $encodedMessage;

    // Return the URL (or redirect)
    return redirect($whatsAppUrl);
}



public function downloadCustomerinspection($checkinId)
{
    // Fetch the check-in record based on the passed ID
    $checkin = VehicleCheckin::findOrFail($checkinId);
    // Get all complaints related to this check-in
    $customerComplaints = Inspection::where('vehicle_checkin_id', $checkinId)->get();
    // Load the PDF view with data (checklist and complaints)
    $pdf = \PDF::loadView('inspections.customer_checklist_pdf', compact('checkin',  'customerComplaints'));

    
    return $pdf->download('vehicle_checklist_' . $checkin->customer_name . '.pdf');
}

    // Show the inspection creation form
    // public function create()
    // {
    //     // $checkins = VehicleCheckin::all();
    //     $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
        
    //     $inspectionItems = [
    //         'WINDSHIELD WIPERS', 'MIRRORS', 'INSTRUMENTS OPERATION', 'EMERGENCY BRAKE', 'BRAKES', 'HORN',
    //         'STEERING & ALIGNMENT', 'ENGINE OIL LEVEL', 'AIR CLEANER', 'ALL GLASS', 'AIR CONDITIONER',
    //         'GENERAL ENGINE OPERATION', 'COOLING SYSTEM', 'FIRE & TIRE PRESSURE', 'BELTS', 'STARTB & IGNITION',
    //         'ALTERNATOR OUTPUT', 'FUEL SYSTEM', 'SUSPENSION SYSTEM', 'TRANSMISSION OIL LEVEL', 'BRAKE LIGHTS',
    //         'TURN SIGNALS', 'HEAD LIGHTS', 'BATTERY OPERATION & LEVELS', 'EXHAUST SYSTEM', 'REFLECTORS',
    //         'SCRATCHES & DENTS', 'OTHER (MotorPool)','Labor Charge'
    //     ];

    //     return view('inspections.create', compact('inspectionItems', 'checkins'));
    // }
public function create()
{
    // Fetching all vehicle check-ins, ordered by ID in descending order
    $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
    
    // Defining a static array of inspection items
    $inspectionItems = [
        'WINDSHIELD WIPERS', 'MIRRORS', 'INSTRUMENTS OPERATION', 'EMERGENCY BRAKE', 'BRAKES', 'HORN',
        'STEERING & ALIGNMENT', 'ENGINE OIL LEVEL', 'AIR CLEANER', 'ALL GLASS', 'AIR CONDITIONER',
        'GENERAL ENGINE OPERATION', 'COOLING SYSTEM', 'FIRE & TIRE PRESSURE', 'BELTS', 'STARTB & IGNITION',
        'ALTERNATOR OUTPUT', 'FUEL SYSTEM', 'SUSPENSION SYSTEM', 'TRANSMISSION OIL LEVEL', 'BRAKE LIGHTS',
        'TURN SIGNALS', 'HEAD LIGHTS', 'BATTERY OPERATION & LEVELS', 'EXHAUST SYSTEM', 'REFLECTORS',
        'SCRATCHES & DENTS', 'OTHER (MotorPool)', 'Labor Charge'
    ];

    // Pass variables to the view
    return view('inspections.create', compact('inspectionItems', 'checkins'));
}



    // Store the inspection data
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
    //         'check' => 'array',
    //         'deficiencies' => 'array',
    //         'services_performed' => 'array',
    //     ]);

    //     foreach ($request->check as $item => $value) {
    //         Inspection::create([
    //             'vehicle_checkin_id' => $request->vehicle_checkin_id,
    //             'inspection_item' => $item,
    //             // 'check' => true,
    //              'check' => $value,
    //             'deficiencies' => $request->deficiencies[$item] ?? '',
    //             'services_performed' => $request->services_performed[$item] ?? '',
    //         ]);
    //     }

    //     return redirect()->route('inspections.index')->with('success', 'Inspection details saved successfully.');
    // }

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'inspection_item' => 'required|array',
        'check' => 'required|array',
        'deficiencies' => 'nullable|array',
        'services_performed' => 'nullable|array',
    ]);

    // Loop through each inspection item and store it in the database
    foreach ($request->inspection_item as $index => $inspectionItem) {
        // Check if the checkbox (check) was selected or not (either 1 for true or 0 for false)
        // Only store items that have been checked (either true or false)
        $check = isset($request->check[$index]) ? $request->check[$index] : null;

        // Only store the inspection record if the checkbox is set (i.e., true or false)
        if ($check !== null) {
            Inspection::create([
                'vehicle_checkin_id' => $request->vehicle_checkin_id,
                'inspection_item' => $inspectionItem,
                'check' => $check, // 1 for checked, 0 for unchecked
                'deficiencies' => $request->deficiencies[$index] ?? '', // Default to empty string if no deficiency is provided
                'services_performed' => $request->services_performed[$index] ?? '', // Default to empty string if no service is provided
            ]);
        }
    }

    return redirect()->route('inspections.index')->with('success', 'Inspection details saved successfully.');
}


// public function edit(Inspection $inspection)
// {
//     $checkins = VehicleCheckin::all(); // Get all vehicle check-ins
//     $inspectionItems = [
//         'WINDSHIELD WIPERS', 'MIRRORS', 'INSTRUMENTS OPERATION', 'EMERGENCY BRAKE', 'BRAKES', 'HORN',
//         'STEERING & ALIGNMENT', 'ENGINE OIL LEVEL', 'AIR CLEANER', 'ALL GLASS', 'AIR CONDITIONER',
//         'GENERAL ENGINE OPERATION', 'COOLING SYSTEM', 'FIRE & TIRE PRESSURE', 'BELTS', 'STARTB & IGNITION',
//         'ALTERNATOR OUTPUT', 'FUEL SYSTEM', 'SUSPENSION SYSTEM', 'TRANSMISSION OIL LEVEL', 'BRAKE LIGHTS',
//         'TURN SIGNALS', 'HEAD LIGHTS', 'BATTERY OPERATION & LEVELS', 'EXHAUST SYSTEM', 'REFLECTORS',
//         'SCRATCHES & DENTS', 'OTHER (MotorPool)','Labor Charge'
//     ]; // This should be a fixed list of inspection items

//     // Fetch the inspection details for this customer
//     $inspectionDetails = Inspection::where('vehicle_checkin_id', $inspection->vehicle_checkin_id)->get();

//     return view('inspections.edit', compact('inspection', 'checkins', 'inspectionItems', 'inspectionDetails'));
// }
public function edit(Inspection $inspection)
{
    // Get all vehicle check-ins
    $checkins = VehicleCheckin::all();

    // Fixed list of inspection items
    $inspectionItems = [
        'WINDSHIELD WIPERS', 'MIRRORS', 'INSTRUMENTS OPERATION', 'EMERGENCY BRAKE', 'BRAKES', 'HORN',
        'STEERING & ALIGNMENT', 'ENGINE OIL LEVEL', 'AIR CLEANER', 'ALL GLASS', 'AIR CONDITIONER',
        'GENERAL ENGINE OPERATION', 'COOLING SYSTEM', 'FIRE & TIRE PRESSURE', 'BELTS', 'STARTB & IGNITION',
        'ALTERNATOR OUTPUT', 'FUEL SYSTEM', 'SUSPENSION SYSTEM', 'TRANSMISSION OIL LEVEL', 'BRAKE LIGHTS',
        'TURN SIGNALS', 'HEAD LIGHTS', 'BATTERY OPERATION & LEVELS', 'EXHAUST SYSTEM', 'REFLECTORS',
        'SCRATCHES & DENTS', 'OTHER (MotorPool)', 'Labor Charge'
    ];

    // Fetch the existing inspection details for this vehicle check-in
    $inspectionDetails = Inspection::where('vehicle_checkin_id', $inspection->vehicle_checkin_id)->get();

    // Build an array of checked items, deficiencies, and services performed
    $checkedItems = [];
    $deficiencies = [];
    $servicesPerformed = [];

    foreach ($inspectionDetails as $detail) {
        $checkedItems[$detail->inspection_item] = $detail->check;
        $deficiencies[$detail->inspection_item] = $detail->deficiencies;
        $servicesPerformed[$detail->inspection_item] = $detail->services_performed;
    }

    return view('inspections.edit', compact('inspection', 'checkins', 'inspectionItems', 'inspectionDetails', 'checkedItems', 'deficiencies', 'servicesPerformed'));
}



public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'inspection_item' => 'required|array',
        'check' => 'required|array',
        'deficiencies' => 'nullable|array',
        'services_performed' => 'nullable|array',
    ]);

    // Find the existing inspection record by ID
    $inspection = Inspection::findOrFail($id);

    // Update the inspection record
    $inspection->vehicle_checkin_id = $request->vehicle_checkin_id;
    $inspection->save();

    // Loop through each inspection item and update or create new records
    foreach ($request->inspection_item as $index => $inspectionItem) {
        // Get the check status (either 1 or 0)
        $check = isset($request->check[$inspectionItem]) ? $request->check[$inspectionItem] : null;

        // Only update/create the record if the checkbox is selected
        if ($check !== null) {
            // Check if this inspection item already exists
            $existingRecord = Inspection::where('vehicle_checkin_id', $inspection->vehicle_checkin_id)
                                        ->where('inspection_item', $inspectionItem)
                                        ->first();

            if ($existingRecord) {
                // Update the existing inspection item
                $existingRecord->check = $check;
                $existingRecord->deficiencies = $request->deficiencies[$inspectionItem] ?? '';
                $existingRecord->services_performed = $request->services_performed[$inspectionItem] ?? '';
                $existingRecord->save();
            } else {
                // Create a new inspection item if it doesn't exist
                Inspection::create([
                    'vehicle_checkin_id' => $inspection->vehicle_checkin_id,
                    'inspection_item' => $inspectionItem,
                    'check' => $check,
                    'deficiencies' => $request->deficiencies[$inspectionItem] ?? '',
                    'services_performed' => $request->services_performed[$inspectionItem] ?? '',
                ]);
            }
        }
    }

    return redirect()->route('inspections.index')->with('success', 'Inspection details updated successfully.');
}


    // Update inspection


    // Delete inspection
    public function destroy(Inspection $inspection)
    {
        $inspection->delete();

        return redirect()->route('inspections.index')->with('success', 'Inspection deleted successfully.');
    }
}
